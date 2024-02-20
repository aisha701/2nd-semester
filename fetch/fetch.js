(async function () {
    let productlist = document.getElementById("productlist");
    let products = await fetch("https://dummyjson.com/products").then
        (resp => resp.json())
    .then(data => {
        console.log(data.products)
        data.products.forEach(element => {
            productlist.innerHTML += `
            <div class="col-lg-3 col-md-6 col-sm-6">
               <div class="card mt-3 text-center" style="width: 100%;" >
  <img src="${element.images[0]}" class="card-img-top" alt="..." height="150">
  <div class="card-body">
    <h5 class="card-title">${element.title} </h5>
    <p class="card-text">
    description:${element.description} 
    price:${element.price}
    rating:${element.rating}
    </p></div>
    <a href="#" class="btn btn-success">${element.discountPercentage}</a>
  </div>
</div>`
        });
    })
})()