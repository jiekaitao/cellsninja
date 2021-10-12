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
  <br>


  <details open>
    <summary>Cell Membrane</summary>
    <div class="faq__content">
      <p>The most basic form of protection in cells remains semi-permeable to allow vital materials to pass through itself in order to provide the cell with the materials critical to its survival.</p>
    </div>
  </details>

    <details>
    <summary>Nucleoid</summary>
    <div class="faq__content">
      <p>Only available for the prokaryotic cell class; the nucleoid is where the genetic material for the cell is found.  Without a membrane and composed entirely of genetic materials and proteins, the nucleoid takes no specific shape.  Similar to the nucleus, the nucleoid is also responsible for controlling the vital functions of its respective cell, such as facilitating cell growth and regulating the cell’s genetic material. </p>
    </div>
  </details>


  <details>
    <summary>Ribosomes</summary>
    <div class="faq__content">
      <p>Required by both classes of cells, ribosomes’ primary function is to convert genetic code into amino acid sequences and build protein polymers from amino acid monomers; this is a process known as protein synthesis or translation.  Ribosomes can either be found in the cytosol known as free ribosomes, or they can be found in the rough endoplasmic reticulum (ER), where the protein they synthesize can be excreted from the cell.</p>
    </div>
  </details>

  <details>
    <summary>Flagella</summary>
    <div class="faq__content">
      <p>The flagella is available to both prokaryotic and eukaryotic cells.  The flagella’s primary function is to provide mobility to the cells also known as chemotaxis.  </p>
    </div>
  </details>

  <details>
    <summary>Smooth ER</summary>
    <div class="faq__content">
      <p>The smooth endoplasmic reticulum (smooth ER) is required for both prokaryotic and eukaryotic cells. The primary function of the smooth ER is to synthesize lipids and phospholipids as in plasma membranes, and steroids,metabolize carbohydrates, detoxify poison, and store calcium.</p>
    </div>
  </details>


  <details>
    <summary>Rough ER</summary>
    <div class="faq__content">
      <p>The rough endoplasmic reticulum (rough ER) is required by both prokaryotes and eukaryotes.  Dotted with ribosomes, the rough ER is responsible for the synthesis of secretory proteins.  These are proteins, like the name suggests, that are secreted by the golgi apparatus to be used for out of cell functions.</p>
    </div>
  </details>

   </main>
</body>


