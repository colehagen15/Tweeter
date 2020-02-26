<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Calculator- Cole Hagen</title>
    <link rel="stylesheet" href="style.css">
    <script src="calculator.js"></script>
</head>
<body>
    <div class="container-fluid">
        <h1>Calculator App</h1>
        <input type="text" id="main">
        <div class="row">
            <div class="col-md">
              <button id="negate" type="button" value="(-)" class="btn btn-secondary">(-)</button>
              <button id="percentage" value="%" class="btn btn-secondary">%</button>
              <button id="decimalPoint" value="." class="btn btn-secondary">.</button>  
            </div>
          <div class="col-md">
              <button id="nine" value="9" type="button" class="btn btn-secondary">9</button>
              <button id="eight" value="8" class="btn btn-secondary">8</button>
              <button id="seven" value="7" class="btn btn-secondary">7</button>
              <button id="add" value="+"class="btn btn-secondary function">+</button>
          </div>
          <div class="col-md">
              <button id="six" value="6" class="btn btn-secondary">6</button>
              <button id="five" value="5" class="btn btn-secondary">5</button>
              <button id="four" value="4" class="btn btn-secondary">4</button>
              <button id="subtract" value="-" class="btn btn-secondary function">-</button>
          </div>
          <div class="col-md">
            <button id="three" value="3" class="btn btn-secondary">3</button>
            <button id="two" value="2" class="btn btn-secondary">2</button>
            <button id="one" value="1" class="btn btn-secondary">1</button>
            <button id="multiply" value="*"class="btn btn-secondary function">x</button>
        </div>
        <div class="col-md">
            <button id="zero" value="0" class="btn btn-secondary">0</button>
            <button id="clear" value="clear" class="btn btn-secondary clearOrCompute">AC</button>
            <button id="compute" value="=" class="btn btn-secondary clearOrCompute">=</button>
            <button id="divide" value="/" class="btn btn-secondary function">/</button>
            
        </div>
        </div>
        <footer>
            </br>
            <p>Created by Cole Hagen</p>
        </footer>
      </div>
      
</body>
</html>