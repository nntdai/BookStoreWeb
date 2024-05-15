<div class="modal modal-lg" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title productName">Product Name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column">
        <img src="product-image.jpg" alt="Product Image" class="productImage" style="height: 400px">
        <table class="table mb-3 mt-3">
            <tr>
                <th>Tác giả</th>
                <td class="productAuthor">Author</td>
            </tr>
            <tr>
                <th>Người dịch</th>
                <td class="productTranslator">Translator</td>

            <tr>
                <th>Nhà xuất bản</th>
                <td class="productPublisher">Publisher</td>
            </tr>
            <tr>
                <th>Năm xuất bản</th>
                <td class="productPublishYear">Publish Year</td>
            </tr>
            <tr>
                <th>Thể loại</th>
                <td class="productCategory">Category</td>
            </tr>
            <tr>
                <th>Số trang</th>
                <td class="productPageCount">Page Count</td>
            </tr>
            <tr>
                <th>Trọng lượng</th>
                <td class="productWeight">Weight</td>
            </tr>
            <tr>
                <th>Kích thước</th>
                <td class="productDimension">Dimension</td>
            </tr>
        </table>
        <h5>Mô tả: </h5>
        <p class="card-text productDescription">Product description...</p>
      </div>
      <div class="modal-footer">
        <h5>Price: <span class="productPrice text-primary">99.99</span></h5>
        <button type="button" class="btn btn-primary" id="btn_addToCart">Add to Cart</button>
      </div>
    </div>
  </div>
</div>