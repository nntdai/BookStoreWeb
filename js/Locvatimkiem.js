$(document).ready(function(){
    $("#searchForm").submit(function(e){
        e.preventDefault();
        $form = $(this);
        //get idTheLoai from form name
        let idTheLoai = $form.find("select[name='theloai']").val();
        //get khoangGia from form name
        let khoangGia = $form.find("select[name='price_range']").val();
        let tenSach = $form.find("input[name='tenSach']").val();
        console.log(tenSach+" "+ idTheLoai+" "+ khoangGia);
        //loadPage(page, khuyenmai, idChuDe, idNgonNgu, idTheLoai, khoangGia, collapse)
        let requestData = {
            page: 1,
            idTheLoai: idTheLoai,
            khoangGia: khoangGia,
            tenSach: tenSach
        };
        loadPage(requestData, "#search-books");

        $("#search-books").show();
    });

    $("#btn_search").click(function(){
        $("#search-books").hide();
    });
});
