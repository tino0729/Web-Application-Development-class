function updateColor() {
  let red = parseInt(document.getElementById("redInput").value);
  let green = parseInt(document.getElementById("greenInput").value);
  let blue = parseInt(document.getElementById("blueInput").value);


  red = red > 255 ? 255 : red;
  green = green > 255 ? 255 : green;
  blue = blue > 255 ? 255 : blue;


  red = red < 0 ? 0 : red;
  green = green < 0 ? 0 : green;
  blue = blue < 0 ? 0 : blue;

  
  console.log(`RGB values: ${red}, ${green}, ${blue}`);

  const colorString = `rgb(${red}, ${green}, ${blue})`;

  document.getElementById("colorDiv").style.backgroundColor = colorString;
}

