    var ls;
    $(document).ready(function () {
        $(".item a.btn-pack").click(function (e) {
            e.preventDefault();
            $this = $(this);

            var pkgData = {
                pkgid: $this.parent().parent().attr('pkg-id'),
                Heading: $this.parent().parent().find('h3').text().trim(),
                orgPrice: $this.parent().parent().find('.cross').text().trim(),
                disPrice: $this.parent().parent().find('.discounted').text().trim(),
                desc: $this.parent().parent().find('.ticklist').html().trim(),
            };
            ls = localStorage.setItem('obj', JSON.stringify(pkgData));
            window.open("http://localhost/aqualogodesign/OrderSequence/", "_self");
        })

    })