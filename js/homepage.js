// Ẩn/Hiện dropdown menu
let angle_down = document.getElementById('angle_down');
angle_down.addEventListener("click", function(event) {
    let dropdown_content = document.getElementById('dropdown_content');
    dropdown_content.classList.toggle('hidden');
})

//Hover danh mục thì sẽ hiện ra chủ đề
window.addEventListener('DOMContentLoaded', function() {
  let categories = document.querySelectorAll('.category');
  let contents = document.querySelectorAll('.content');
  categories.forEach(function(category, index) {
    category.addEventListener('mouseover', function() {
      hideAllContents();
      contents[index].classList.add('active');
    });

    category.addEventListener('mouseleave', function() {
      contents[index].classList.remove('active');
    });
  });

  function hideAllContents() {
    contents.forEach(function(content) {
      content.classList.remove('active');
    });
  }
});


//Click vào chủ đề để lọc sách ở các vùng sách tiếng việt và nước ngoài
window.addEventListener('DOMContentLoaded', function() {
  var listItems = document.querySelectorAll('.bookszoneproduct_header .list li');

  listItems.forEach(function(listItem) {
    listItem.addEventListener('click', function() {
      // Loại bỏ hiệu ứng box-shadow khỏi tất cả các phần tử
      listItems.forEach(function(item) {
        item.style.boxShadow = 'none';
      });

      // Áp dụng hiệu ứng box-shadow vào phần tử được click
      this.style.boxShadow = '0 3px';
    });
  });
});

//Click vào img Search sẽ hiện ra input
let Btn_search = document.getElementById('btn_search');
Btn_search.addEventListener('click', function(){
  let Input_search = document.getElementById('search');
  Input_search.classList.toggle('block');
})





