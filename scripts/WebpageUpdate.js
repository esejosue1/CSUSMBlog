// External javascript file for all site functions

// Function for calculating the total of the marked values.
function calculateTotal(event)
{
  console.log("calculateTotal() called");

  var menuitems = document.getElementsByTagName("input");
  var total = document.getElementById("total");
  var totalamount = 0;
  //console.log(menuitems);
  //console.log(menuitems[0].value);

  // Go through entire menuitems which covers every input variable
  for(var counter = 0; counter < menuitems.length; counter++)
  {
    if(menuitems[counter].checked == true) // If checkbox is marked true
    {
      totalamount += parseFloat(menuitems[counter].value);
    }

  }

  total.innerHTML = "Your total cost for the order is: $" + totalamount.toFixed(2);

}

function returnToHome()
{
  console.log("Returning to Home Page");
}
//window.addEventListener
