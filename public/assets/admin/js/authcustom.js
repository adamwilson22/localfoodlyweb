$("#phone, #phone-country, #phone-num").intlTelInput({
    geoIpLookup: function (e) {
      $.get("https://ipinfo.io", function () {}, "jsonp").always(function (t) {
            var s = t && t.country ? t.country : "";
            e(s), (countrtIP = t.ip);
        });
    },
    initialCountry: "auto",
    nationalMode: !0,
    separateDialCode: !0,
  });
  
  // otp
  let digitValidate = function(ele){
    console.log(ele.value);
    ele.value = ele.value.replace(/[^0-9]/g,'');
  }
  
  // let tabChange = function(val){
  //     let ele = document.querySelectorAll('input');
  //     if(ele[val-1].value != ''){
  //       ele[val].focus()
  //     }else if(ele[val-1].value == ''){
  //       ele[val-2].focus()
  //     }   
  //  }
  let tabChange = function(val){
    let ele = document.querySelectorAll('input');
    if(ele[val].value != ''){
      ele[val+1].focus()
    }else if(ele[val].value == ''){
      ele[val].focus()
    }   
 }
  