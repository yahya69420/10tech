function toggleSortDropdown() {
    var sortDropdown = document.getElementById("sortDropdown");
    var brandDropdown = document.getElementById("brandDropdown");
    var sortArrow = document.getElementById("sortArrow");
    var brandArrow = document.getElementById("brandArrow");
  
    sortDropdown.classList.toggle("show");
    brandDropdown.classList.remove("show");
    sortArrow.classList.toggle("inverted");
    brandArrow.classList.remove("inverted");
  }
  
  function toggleBrandDropdown() {
    var sortDropdown = document.getElementById("sortDropdown");
    var brandDropdown = document.getElementById("brandDropdown");
    var sortArrow = document.getElementById("sortArrow");
    var brandArrow = document.getElementById("brandArrow");
  
    sortDropdown.classList.remove("show");
    brandDropdown.classList.toggle("show");
    sortArrow.classList.remove("inverted");
    brandArrow.classList.toggle("inverted");
  }
  
  window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  function sortProdcuts(sortType) {
    console.log("Sorting by: " + sortType);
  }
  
  function sortHighToLow() {
    // Add your logic for sorting high to low here
  }
  
  function selectBrand(brand) {
    // Handle the selection of brand here
    console.log("Selected brand:", brand);
  }