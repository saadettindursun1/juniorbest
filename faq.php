<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
*{
    font-family: Inter,sans-serif;
    letter-spacing: 1px !important;
}

.collapsible {
  border-radius: 30px !important;
  border-color: green;
  background-color: #afd1f6;
  color: black;
  cursor: pointer;
  padding: 18px;
  width: 80%;
  border: none;
  text-align: left !important;
  padding-left: 3%;
  outline: none;
  font-size: 1.2rem;
  font-weight: 600;
  background: #afd1f6 url(img/plus.png) no-repeat 98% 50%;
  background-size: 40px 40px;
}

.active-jb{
  background: transparent url(img/minus.png) no-repeat 98% 50% !important;
  background-size: 40px 40px !important;
}

.collapsible img{
  width: 100px;
  height: 100px;
}

.baslik{
  font-size: 3rem !important;
  font-weight: 900 !important;
  margin-top: 7%;
  color: black;
}

.content {
  width: 80%;
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
}
</style>
</head>
<body>

  <p class="baslik text-center">Sıkça Sorulan Sorular:</p>
  <div class="d-flex align-items-center flex-column">
    <button class="collapsible text-center mt-5">Open Section 1</button>
    <div class="content mt-3">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <button class="collapsible text-center mt-3">Open Section 2</button>
    <div class="content mt-3">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <button class="collapsible text-center mt-3">Open Section 3</button>
    <div class="content mt-3">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active-jb");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>

</body>
</html>
