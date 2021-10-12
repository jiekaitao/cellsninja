<html>
    <style>

body {
  font-family: 'Montserrat', sans-serif;
  font-size: 16px;
  font-weight: 400;
  background: #0B2647;
  color: white;
  line-height: 1.5;
  letter-spacing: 0.5px;
  text-align: center;
  height: 100vh;
}
h1 {
  font-size: clamp(20px, 4vw, 30px);
  line-height: 1.2;
  margin-bottom: 40px;
}
main {
  max-width: 520px;
  margin: 0 auto;
}
summary {
  font-size: 1.25rem;
  font-weight: 600;
  background-color: #fff;
  color: #333;
  padding: 1rem;
  margin-bottom: 1rem;
  outline: none;
  border-radius: 0.25rem;
  text-align: left;
  cursor: pointer;
  position: relative;
}
details[open] summary ~ * {
  animation: sweep .5s ease-in-out;
}
@keyframes sweep {
  0%    {opacity: 0; margin-top: -10px}
  100%  {opacity: 1; margin-top: 0px}
}
details > summary::after {
  position: absolute;
  content: "+";
  right: 20px;
}
details[open] > summary::after {
  position: absolute;
  content: "-";
  right: 20px;
}
details > summary::-webkit-details-marker {
  display: none;
}


</style>



<body>
  <h1>Class Info: Prokaryote</h1>
  <main>



  
  <details open>
    <summary>How I solve this issue?</summary>
    <div class="faq__content">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor suscipit, iure tenetur eveniet, vero tempore delectus? Perferendis, quisquam ullam consequuntur?</p>
    </div>
  </details>

    <details>
    <summary>How to input your data on this board?</summary>
    <div class="faq__content">
      <p>Fugiat quo voluptas nulla pariatur? Et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque. Accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
    </div>
  </details>





   </main>
</body>


