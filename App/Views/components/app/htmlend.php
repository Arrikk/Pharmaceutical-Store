</div>
</div>
<!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="/Public/assets/js/bundle.js?ver=3.0.0"></script>
<script src="/Public/assets/js/scripts.js?ver=3.0.0"></script>
<script src="/Public/assets/js/charts/gd-default.js?ver=3.0.0"></script>
<script src="/Public/assets/js/charts/chart-ecommerce.js?ver=3.0.0"></script>
<script src="/Public/assets/js/charts/chart-analytics.js?ver=3.0.0"></script>
<script>
    let container = $(".nk-tb-list.nk-tb-ulist");
    let innerContainer = container.find(".nk-tb-item:not(.nk-tb-head)");

    let limit = $("#limit-list").find("li");
    let order = $("#order-list").find("li").not(".order-title");
    let page = $("#select-page");


    let token = localStorage.getItem("token") ?
        localStorage.getItem("token") :
        "";

    window.bz = {
        defaults: {
            items: [],
            totalItems: 0,
            page: 1,
            loading: true,
            limit: 10,
            order: "DESC",
        },
        headers: {
            Authorization: `Bearer ${token}`,
        },
        money: (money) => {
            return (+money).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        },
        sign: '$',
        currency: 'USD',
        dateF: (dte) => {
            let options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            let theDay = new Date(dte);
            return theDay.toLocaleDateString('en-US', options)
        },
        loader: `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`
    }


    $(limit).click(function() {
        $(limit).removeClass("active");
        $(this).addClass("active");
        levi.defaults.items = []
        levi.defaults.limit = +$(this).text();
        init();
    });

    $(order).click(function() {
        $(order).removeClass("active");
        $(this).addClass("active");
        levi.defaults.order = $(this).text();
        init();
    });


    function setPageList(list = 1) {
        list = list < 1 ? 1 : list;
        $(page).html("");

        if (list > 1) {
            for (i = 0; i <= list - 1; i++) {
                $(page).append(`<option value=${i}">${i}</option>`);
            }
        }
        $("#total-desc-count").text(
            `${levi.defaults.totalItems} ${levi.defaults.totalItems > 1 ? levi.desc : levi.desc+'s'}`
        );
    }
</script>
<script src="/Public/js/axios.min.js"></script>
</body>

</html>