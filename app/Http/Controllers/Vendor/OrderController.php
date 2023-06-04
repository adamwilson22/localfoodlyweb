<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CentralLogics\Helpers;
use App\CentralLogics\OrderLogic;
use App\Models\Order;
use App\Models\Category;
use App\Models\Food;
use App\Models\OrderDetail;
use App\Models\Admin;
use App\Models\RestaurantWallet;
use App\Models\AdminWallet;
use App\Models\ItemCampaign;
use App\Models\BusinessSetting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        // Order::where(['checked' => 0])->where('restaurant_id',Helpers::get_restaurant_id())->update(['checked' => 1]);

        $pendingorders = DB::table('orders as oo')
            ->join('users as cc', 'cc.id', '=', 'oo.user_id')
            ->where('order_status', 'pending')
            ->where('oo.restaurant_id', Helpers::get_restaurant_id())
            ->select('oo.*', 'cc.f_name', 'cc.l_name')
            ->get();

        $recurringOrders = DB::table('orders as oo')
            ->join('users as cc', 'cc.id', '=', 'oo.user_id')
            ->where('order_status', 'recurring')
            ->where('oo.restaurant_id', Helpers::get_restaurant_id())
            ->select('oo.*', 'cc.f_name', 'cc.l_name')
            ->get();

        // $preOrders = Order::with('customer', 'details.food')
        //     ->whereHas('details.food', function (Builder $query) {
        //         $query->where('product_type', 'preorder');
        //     })
        //     ->where('order_status', 'pending')
        //     ->where('restaurant_id', Helpers::get_restaurant_id())
        //     ->get();
        
        $preOrders = Food::where([
            ['product_type', 'preorder'],
            ['restaurant_id', Helpers::get_restaurant_id()]
        ])->paginate(config('default_pagination'));

        $foodPreOrders = [];

        foreach ($preOrders as $key => $preOrder) {
            $ordeDetails = OrderDetail::where([
                ['restaurant_id', Helpers::get_restaurant_id()],
                ['food_id', $preOrder->id],
            ])->get()->count();

            array_push($foodPreOrders, [
                "id" => "{$preOrder->id}",
                "name" => "{$preOrder->name}",
                "description" => "{$preOrder->description}",
                "product_type" => "{$preOrder->product_type}",
                "image" => "{$preOrder->image}",
                "restaurant_id" => "{$preOrder->restaurant_id}",
                "fulfillment_date" => "{$preOrder->fulfillment_date}",
                "fulfillment_time" => "{$preOrder->fulfillment_time}",
                "pre_order_end_date" => "{$preOrder->pre_order_end_date}",
                "pre_order_end_time" => "{$preOrder->pre_order_end_time}",
                "fulfillment_type" => "{$preOrder->fulfillment_type}",
                "pre_order_quantity_limit" => "{$preOrder->pre_order_quantity_limit}",
                "serves" => "{$preOrder->serves}",
                "labels" => "{$preOrder->labels}",
                "totalOrderCount" => "{$ordeDetails}",
            ]);
        }

        // dd($preOrders->toArray());

        $orders = Order::with(['customer'])->orderBy('schedule_at', 'desc')->where('order_status', 'confirmed')
            ->where('restaurant_id', Helpers::get_restaurant_id())
            ->paginate(config('default_pagination'));

        $delivery = Order::where('order_type', 'delivery')
            ->where('restaurant_id', Helpers::get_restaurant_id())->count();
        $pickup = Order::where('order_type', 'pickup')
            ->where('restaurant_id', Helpers::get_restaurant_id())->count();
        $curbside = Order::where('order_type', 'curbside')
            ->where('restaurant_id', Helpers::get_restaurant_id())->count();
        // dd( $delivery);
        // foreach ($orders as $key => $order) {
        // dd($order->customer->f_name);
        // dd($order);
        // }
        // dd($pendingorders);
        // return view('vendor-views.addon.order');
        return view('vendor-views.addon.order', compact('orders', 'pendingorders', 'recurringOrders', 'preOrders','foodPreOrders', 'delivery', 'pickup', 'curbside'));
    }
    
    public function PreOrderlist($status)
    {
        Order::where(['checked' => 0])->where('restaurant_id', Helpers::get_restaurant_id())->update(['checked' => 1]);

        $preOrders = Food::where([
            ['product_type', 'preorder'],
            ['restaurant_id', Helpers::get_restaurant_id()]
        ])->orderBy('updated_at','desc')->get();

        $foodPreOrders = [];

        foreach ($preOrders as $key => $preOrder) {
            $ordeDetails = OrderDetail::where([
                ['restaurant_id', Helpers::get_restaurant_id()],
                ['food_id', $preOrder->id],
            ])->get()->count();

            array_push($foodPreOrders, [
                "id" => "{$preOrder->id}",
                "name" => "{$preOrder->name}",
                "description" => "{$preOrder->description}",
                "product_type" => "{$preOrder->product_type}",
                "image" => "{$preOrder->image}",
                "restaurant_id" => "{$preOrder->restaurant_id}",
                "fulfillment_date" => "{$preOrder->fulfillment_date}",
                "fulfillment_time" => "{$preOrder->fulfillment_time}",
                "pre_order_end_date" => "{$preOrder->pre_order_end_date}",
                "pre_order_end_time" => "{$preOrder->pre_order_end_time}",
                "fulfillment_type" => "{$preOrder->fulfillment_type}",
                "pre_order_quantity_limit" => "{$preOrder->pre_order_quantity_limit}",
                "serves" => "{$preOrder->serves}",
                "labels" => "{$preOrder->labels}",
                "totalOrderCount" => "{$ordeDetails}",
            ]);
        }

        return view('vendor-views.addon.per_order', compact('preOrders','foodPreOrders'));

    }
    
    public function PreOrderDetail($id)
    {
        $ordeDetails = OrderDetail::with('order.customer')->where([
            ['restaurant_id', Helpers::get_restaurant_id()],
            ['food_id', $id],
        ])->paginate(config('default_pagination'));;

        // dd($ordeDetails->toArray());
        return view('vendor-views.pre_order.list', compact('ordeDetails','id'));
    }
    
    public function PreOrderStatus($id,Request $request)
    {
        $ordeDetails = OrderDetail::with('order.customer')->where([
            ['restaurant_id', Helpers::get_restaurant_id()],
            ['food_id', $id],
        ])->get();


        foreach ($ordeDetails as $key => $ordeDetail) {
            $order = Order::select('id','order_status','pending','canceled','refunded',
            'accepted','confirmed','processing','handover','picked_up','delivered','refund_requested')
            ->where('id',$ordeDetail->order->id)->first();
            $order->order_status = $request->order_status;
            if($order->pending == $request->order_status)
            {
                $order->pending = now();
            }
            if($order->processing == $request->order_status)
            {
                $order->processing = now();
            }
            if($order->canceled == $request->order_status)
            {
                $order->canceled = now();
            }
            if($order->accepted == $request->order_status)
            {
                $order->accepted = now();
            }
            if($order->confirmed == $request->order_status)
            {
                $order->confirmed = now();
            }
            if($order->processing == $request->order_status)
            {
                $order->processing = now();
            }
            if($order->handover == $request->order_status)
            {
                $order->handover = now();
            }
            if($order->picked_up == $request->order_status)
            {
                $order->picked_up = now();
            }
            if($order->delivered == $request->order_status)
            {
                $order->delivered = now();
            }
            if($order->refund_requested == $request->order_status)
            {
                $order->refund_requested = now();
            }
            $order->save();
        }

        return [
            'status' => true,
            'msg' => 'status change successfully'
        ];
    }

    public function list($status)
    {
        // $orders = Order::with(['customer'])->where('restaurant_id',Helpers::get_restaurant_id())->where('order_status', 'pending')->get();
        // dd($orders);

        Order::where(['checked' => 0])->where('restaurant_id', Helpers::get_restaurant_id())->update(['checked' => 1]);

        $orders = Order::with(['customer'])
            ->when($status == 'searching_for_deliverymen', function ($query) {
                return $query->SearchingForDeliveryman();
            })
            ->when($status == 'confirmed', function ($query) {
                return $query->where('order_status', 'confirmed');
                // return $query->whereIn('order_status',['confirmed', 'accepted'])->whereNotNull('confirmed');

            })
            ->when($status == 'pending', function ($query) {
                return $query->where('order_status', 'pending');
                // if(config('order_confirmation_model') == 'restaurant' || Helpers::get_restaurant_data()->self_delivery_system)
                // {
                //     return $query->where('order_status','pending');
                // }
                // else
                // {
                //     return $query->where('order_status','pending');
                // }
            })
            ->when($status == 'cooking', function ($query) {
                return $query->where('order_status', 'processing');
            })
            ->when($status == 'food_on_the_way', function ($query) {
                return $query->where('order_status', 'picked_up');
            })
            ->when($status == 'delivered', function ($query) {
                return $query->Delivered();
            })
            ->when($status == 'ready_for_delivery', function ($query) {
                return $query->where('order_status', 'handover');
            })
            ->when($status == 'refund_requested', function ($query) {
                return $query->RefundRequest();
            })
            ->when($status == 'refunded', function ($query) {
                return $query->Refunded();
            })
            ->when($status == 'scheduled', function ($query) {
                return $query->Scheduled()->where(function ($q) {
                    if (config('order_confirmation_model') == 'restaurant' || Helpers::get_restaurant_data()->self_delivery_system) {
                        $q->whereNotIn('order_status', ['failed', 'canceled', 'refund_requested', 'refunded']);
                    } else {
                        $q->whereNotIn('order_status', ['pending', 'failed', 'canceled', 'refund_requested', 'refunded'])->orWhere(function ($query) {
                            $query->where('order_status', 'pending')->where('order_type', 'take_away');
                        });
                    }
                });
            })
            ->when($status == 'all', function ($query) {
                return $query->where(function ($query) {
                    $query->whereNotIn('order_status', (config('order_confirmation_model') == 'restaurant' || Helpers::get_restaurant_data()->self_delivery_system) ? ['failed', 'canceled', 'refund_requested', 'refunded'] : ['pending', 'failed', 'canceled', 'refund_requested', 'refunded'])
                        ->orWhere(function ($query) {
                            return $query->where('order_status', 'pending')->where('order_type', 'take_away');
                        });
                });
            })
            // ->when(in_array($status, ['pending','confirmed']), function($query){
            //     return $query->OrderScheduledIn(30);
            // })
            ->Notpos()
            ->where('restaurant_id', \App\CentralLogics\Helpers::get_restaurant_id())
            ->orderBy('schedule_at', 'desc')
            ->paginate(config('default_pagination'));

        $status = trans('messages.' . $status);

        // dd($orders);

        return view('vendor-views.order.list', compact('orders', 'status'));
    }

    public function search(Request $request)
    {
        $key = explode(' ', $request['search']);
        $orders = Order::where(['restaurant_id' => Helpers::get_restaurant_id()])->where(function ($q) use ($key) {
            foreach ($key as $value) {
                $q->orWhere('id', 'like', "%{$value}%")
                    ->orWhere('order_status', 'like', "%{$value}%")
                    ->orWhere('transaction_reference', 'like', "%{$value}%");
            }
        })->Notpos()->limit(100)->get();
        return response()->json([
            'view' => view('vendor-views.order.partials._table', compact('orders'))->render()
        ]);
    }

    public function details(Request $request, $id)
    {
        $order = Order::with(['details', 'customer' => function ($query) {
            return $query->withCount('orders');
        }, 'delivery_man' => function ($query) {
            return $query->withCount('orders');
        }])->where(['id' => $id, 'restaurant_id' => Helpers::get_restaurant_id()])->first();
        if (isset($order)) {
            return view('vendor-views.order.order-view', compact('order'));
        } else {
            Toastr::info('No more orders!');
            return back();
        }
    }

    public function orderdetails(Request $request, $id)
    {
        $order = Order::with(['details', 'customer' => function ($query) {
            return $query->withCount('orders');
        }, 'delivery_man' => function ($query) {
            return $query->withCount('orders');
        }])->where(['id' => $id, 'restaurant_id' => Helpers::get_restaurant_id()])->first();
        if (isset($order)) {
            return view('vendor-views.order.order-view', compact('order'));
        } else {
            Toastr::info('No more orders!');
            return back();
        }

        // $order = Order::with(['details', 'customer'=>function($query){
        //     return $query->withCount('orders');
        // },'delivery_man'=>function($query){
        //     return $query->withCount('orders');
        // }])->where(['id' => $id, 'restaurant_id' => Helpers::get_restaurant_id()])->first();
        // // }])->where(['id' => $id])->first();

        // // return response()->json($order);
        // $food_ids = [];
        // if (isset($order)) {
        //     foreach ($order->details as $o) {
        //         # code...
        //         $food_ids[] = $o->food_id;
        //         // dd($o);
        //     }
        //     $products = Food::whereIn('id', $food_ids)->get();
        //     foreach ($products as $product) {
        //         $product->image = unserialize($product->image);
        //         $product->image =  asset('images/'.$product->image[0]);

        //     }
        //     foreach ($order->details as $key => $value) {
        //         # code...
        //         foreach ($products as $product) {
        //             # code...
        //             if($product->id == $value->food_id)
        //                 $value->food_details = $product;
        //         }
        //     }
        //     dd($order);
        //     return view('vendor-views.order.order-view', compact('order'));

        // } else {
        //     Toastr::info('No more orders!');
        //     return back();
        // }
    }

    public function detailsAjax(Request $request, $id)
    {
        $order = Order::with(['details' => function ($query) {
            return $query->with('food');
        }, 'customer' => function ($query) {
            return $query->withCount('orders');
        }, 'delivery_man' => function ($query) {
            return $query->withCount('orders');
        }])->where(['id' => $id, 'restaurant_id' => Helpers::get_restaurant_id()])->first();
        // }])->where(['id' => $id])->first();
        // return response()->json($order);

        if (isset($order)) {

            // return view('vendor-views.order.order-view', compact('order'));
            // dd($order);
            return response()->json($order);
        } else {
            Toastr::info('No more orders!');
            return back();
        }
    }

    public function status(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'order_status' => 'required|in:confirmed,processing,handover,delivered,canceled'
        ], [
            'id.required' => 'Order id is required!'
        ]);

        $order = Order::where(['id' => $request->id, 'restaurant_id' => Helpers::get_restaurant_id()])->first();

        if ($order->delivered != null) {
            Toastr::warning(trans('messages.cannot_change_status_after_delivered'));
            return back();
        }

        if ($request['order_status'] == 'canceled' && !config('canceled_by_restaurant')) {
            Toastr::warning(trans('messages.you_can_not_cancel_a_order'));
            return back();
        }

        if ($request['order_status'] == 'canceled' && $order->confirmed) {
            Toastr::warning(trans('messages.you_can_not_cancel_after_confirm'));
            return back();
        }



        if ($request['order_status'] == 'delivered' && $order->order_type != 'take_away' && !Helpers::get_restaurant_data()->self_delivery_system) {
            Toastr::warning(trans('messages.you_can_not_delivered_delivery_order'));
            return back();
        }

        if ($request['order_status'] == "confirmed") {
            // if(!Helpers::get_restaurant_data()->self_delivery_system && config('order_confirmation_model') == 'deliveryman' && $order->order_type != 'take_away')
            // {
            //     Toastr::warning(trans('messages.order_confirmation_warning'));
            //     return back();
            // }
        }

        if ($request->order_status == 'delivered') {
            $order_delivery_verification = (bool)\App\Models\BusinessSetting::where(['key' => 'order_delivery_verification'])->first()->value;
            if ($order_delivery_verification) {
                if ($request->otp) {
                    if ($request->otp != $order->otp) {
                        Toastr::warning(trans('messages.order_varification_code_not_matched'));
                        return back();
                    }
                } else {
                    Toastr::warning(trans('messages.order_varification_code_is_required'));
                    return back();
                }
            }

            if ($order->transaction  == null) {
                if ($order->payment_method == 'cash_on_delivery') {
                    $ol = OrderLogic::create_transaction($order, 'restaurant', null);
                } else {
                    $ol = OrderLogic::create_transaction($order, 'admin', null);
                }


                if (!$ol) {
                    Toastr::warning(trans('messages.faield_to_create_order_transaction'));
                    return back();
                }
            }

            $order->payment_status = 'paid';

            $order->details->each(function ($item, $key) {
                if ($item->food) {
                    $item->food->increment('order_count');
                }
            });
            $order->customer->increment('order_count');
        }
        if ($request->order_status == 'canceled' || $request->order_status == 'delivered') {
            if ($order->delivery_man) {
                $dm = $order->delivery_man;
                $dm->current_orders = $dm->current_orders > 1 ? $dm->current_orders - 1 : 0;
                $dm->save();
            }
        }

        if ($request->order_status == 'delivered') {
            $order->restaurant->increment('order_count');
            if ($order->delivery_man) {
                $order->delivery_man->increment('order_count');
            }
        }
        $order->order_status = $request->order_status;
        if ($request->order_status == "processing") {
            $order->processing_time = $request->processing_time;
        }
        $order[$request['order_status']] = now();
        $order->save();
        if (!Helpers::send_order_notification($order)) {
            Toastr::warning(trans('messages.push_notification_faild'));
        }

        Toastr::success(trans('messages.order') . ' ' . trans('messages.status_updated'));
        return back();
    }

    public function update_shipping(Request $request, $id)
    {
        $request->validate([
            'contact_person_name' => 'required',
            'address_type' => 'required',
            'contact_person_number' => 'required',
            'address' => 'required',
        ]);

        $address = [
            'contact_person_name' => $request->contact_person_name,
            'contact_person_number' => $request->contact_person_number,
            'address_type' => $request->address_type,
            'address' => $request->address,
            'floor' => $request->floor,
            'road' => $request->road,
            'house' => $request->house,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'created_at' => now(),
            'updated_at' => now()
        ];

        DB::table('customer_addresses')->where('id', $id)->update($address);
        Toastr::success('Delivery address updated!');
        return back();
    }

    public function generate_invoice($id)
    {
        // $order = Order::where(['id' => $id, 'restaurant_id' => Helpers::get_restaurant_id()])->first();
        $order = Order::with(['details', 'customer' => function ($query) {
            return $query->withCount('orders');
        }, 'delivery_man' => function ($query) {
            return $query->withCount('orders');
        }])->where(['id' => $id, 'restaurant_id' => Helpers::get_restaurant_id()])->first();
        // }])->where(['id' => $id])->first();

        // return response()->json($order);
        $food_ids = [];
        if (isset($order)) {
            foreach ($order->details as $o) {
                # code...
                $food_ids[] = $o->food_id;
                // dd($o);
            }
            $products = Food::whereIn('id', $food_ids)->get();
            foreach ($products as $product) {
                $product->image = unserialize($product->image);
                $product->image =  asset('images/' . $product->image[0]);
            }
            foreach ($order->details as $key => $value) {
                # code...
                foreach ($products as $product) {
                    # code...
                    if ($product->id == $value->food_id)
                        $value->food_details = $product;
                }
            }
            // return view('vendor-views.order.order-view', compact('order'));

        }
        return view('vendor-views.order.invoice', compact('order'));
    }

    public function add_payment_ref_code(Request $request, $id)
    {
        Order::where(['id' => $id, 'restaurant_id' => Helpers::get_restaurant_id()])->update([
            'transaction_reference' => $request['transaction_reference']
        ]);

        Toastr::success('Payment reference code is added!');
        return back();
    }
}
