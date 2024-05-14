let btn_search = document.getElementById('btn_search');
btn_search.addEventListener('click',function(){
    let search_dropdown = document.getElementById('search_dropdown');
    search_dropdown.classList.toggle('hidden');
})
function filterBooksVie(chude) {
    // Tạo đối tượng XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Xử lý phản hồi từ máy chủ
    xhr.onreadystatechange = function(e) {
      // e.preventDefault();
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Cập nhật nội dung trang với danh sách sách đã được lọc
          document.getElementById("sachtiengviet_carousel").innerHTML = xhr.responseText;
        } else {
          // Xử lý lỗi nếu có
          console.error(xhr.status);
        }
      }
    };
    // Gửi yêu cầu AJAX
    xhr.open("GET", "./homepage_pages/Loctheochude.php?chude=" + encodeURIComponent(chude), true);
    xhr.send();
  }
  function filterBooksEng(chude) {
    // Tạo đối tượng XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Xử lý phản hồi từ máy chủ
    xhr.onreadystatechange = function(e) {
      // e.preventDefault();
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Cập nhật nội dung trang với danh sách sách đã được lọc
          document.getElementById("sachtienganh_carousel").innerHTML = xhr.responseText;
        } else {
          // Xử lý lỗi nếu có
          console.error(xhr.status);
        }
      }
    };
    // Gửi yêu cầu AJAX
    xhr.open("GET", "./homepage_pages/Loctheochude.php?chude=" + encodeURIComponent(chude), true);
    xhr.send();
  }
 

  function hide() {
        const bannerCarousel = document.getElementById("banner_carousel");
        const filteredBooksContainer = document.getElementById("filtered-books");
        const khuyemaicontainer = document.getElementById("khuyenmai");
        const tiengvietcontainer = document.getElementById("vie");
        const tienganhcontainer = document.getElementById("eng");
        const searchBooksContainer = document.getElementById("search-books");

        bannerCarousel.classList.add("hidden");
        khuyemaicontainer.classList.add("hidden");
        tiengvietcontainer.classList.add("hidden");
        tienganhcontainer.classList.add("hidden");
        filteredBooksContainer.style.display = "block";
        if(searchBooksContainer.style.display = "block"){
          searchBooksContainer.style.display = "none";
        }
        
    }
    function hidefilter() {
      const bannerCarousel = document.getElementById("banner_carousel");
      const filteredBooksContainer = document.getElementById("filtered-books");
      const khuyemaicontainer = document.getElementById("khuyenmai");
      const tiengvietcontainer = document.getElementById("vie");
      const tienganhcontainer = document.getElementById("eng");
      const searchBooksContainer = document.getElementById("search-books");

      bannerCarousel.classList.add("hidden");
      khuyemaicontainer.classList.add("hidden");
      tiengvietcontainer.classList.add("hidden");
      tienganhcontainer.classList.add("hidden");
      if(filteredBooksContainer.style.display="block"){
        filteredBooksContainer.style.display = "none";
      }
      searchBooksContainer.style.display = "block";
  }
    
    // Lắng nghe sự kiện click trên các thẻ <a> có thuộc tính data-theloai
    const theloaiLinks = document.querySelectorAll("a[data-theloai]");

    theloaiLinks.forEach((link) => {
        link.addEventListener("click", function(e) {
            e.preventDefault(); // Ngăn chặn hành vi mặc định của trình duyệt khi nhấp vào liên kết

            const theloai = this.getAttribute("data-theloai");
            console.log(theloai);
            
            filterBooksByTheloai(theloai);
            hide();
        });
    });

    // Hàm gửi yêu cầu lọc sách theo thể loại đến máy chủ
    function filterBooksByTheloai(theloai) {
        // Gửi yêu cầu AJAX đến máy chủ để lấy sách theo thể loại
        const xhr = new XMLHttpRequest();
       
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    const filteredBooks = xhr.responseText;

                    // Hiển thị kết quả lọc sách
                    const filteredBooksContainer = document.getElementById("filtered-books");
                    filteredBooksContainer.innerHTML = filteredBooks;
                } else {
                    console.error("Có lỗi xảy ra khi lọc sách.");
                }
            }
        };
        xhr.open("GET", "./homepage_pages/Locsach.php?theloai=" + theloai, true);
        xhr.send();
    }
    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("searchForm").addEventListener("submit", function(e) {
        e.preventDefault();
        hidefilter();
        var keyword = document.getElementById("keyword").value;
        var theloai = document.getElementById("theloai").value;
        var priceRange = document.getElementById("price_range").value;

        var minPrice;
        var maxPrice;
        
        if (priceRange === "0-100000") {
            minPrice = 0;
            maxPrice = 100000;
        } else if (priceRange === "100000-500000") {
            minPrice = 100000;
            maxPrice = 500000;
        }

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = xhr.responseText;
                    const searchBooksContainer = document.getElementById("search-books");
                    searchBooksContainer.innerHTML = response;
                } else {
                    console.error("Có lỗi xảy ra khi tìm kiếm.");
                }
            }
        };

        var url = "./homepage_pages/Timkiem.php";
        url += "?keyword=" + encodeURIComponent(keyword);
        url += "&theloai=" + encodeURIComponent(theloai);
        if (minPrice !== undefined && maxPrice !== undefined) {
            url += "&min_price=" + encodeURIComponent(minPrice);
            url += "&max_price=" + encodeURIComponent(maxPrice);
        }


        xhr.open("GET", url, true);
        xhr.send();
    });
});