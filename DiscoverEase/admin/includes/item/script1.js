function handleViewButtonClick(itemId) {
    var form = document.getElementById('form' + itemId);

    if (form.style.display === 'none' || form.style.display === '') {
        // Show the form
        form.style.display = 'block';
        // You can use the itemId if needed
        console.log('View button clicked for ItemID: ' + itemId);
    } else {
        // Hide the form
        form.style.display = 'none';
    }

    // Hide other forms (assuming you have forms with IDs form1, form2, etc.)
    for (var i = 1; i <= 100; i++) {
        if (i !== itemId) {
            var otherForm = document.getElementById('form' + i);
            if (otherForm) {
                otherForm.style.display = 'none';
            }
        }
    }
}

function closeForm(formId) {
    var form = document.getElementById(formId);

    if (form) {
        form.style.display = 'none';
    }
}



const tbitems = [
    { status: "Lost" },
    { status: "Found" },
    { status: "Claimed" }
  ];

  // Get the select element
  const statusSelect = document.getElementById("Status");

  // Function to update the selected value based on the status in tbitems
  function updateStatus() {
    // Get the current item (you may adjust this based on your actual data structure)
    const currentItem = tbitems[0]; // For example, get the first item

    // Set the selected value of the select element to the status of the current item
    statusSelect.value = currentItem.status;
  }

  // Call the function to update the status (you may call this function as needed)
  updateStatus();


  var return1 =document.getElementById('return');

  return1.addEventListener("click", function(){
    window.close('items.php');
    window.open('items.php');
  })