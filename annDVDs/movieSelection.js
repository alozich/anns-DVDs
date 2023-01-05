//Initializing
var numSeatsSelected = 0;
const seats = document.querySelectorAll('.available, .mine');

const listSeatsSelected = [];
const listSeatsToRemove = [];
const seatsToFile = document.getElementById('seatsToFile');
const seatsToRemove = document.getElementById('seatsToRemove');

//Function when user clicks available seat
const seatSelected = e => {
	var seatCounter = document.getElementById('seatCounter');
	
	var displayListSeatsSelected = document.getElementById('seatsselected');
	var seat = e.target.innerHTML;
	
	if(!(e.target.classList.contains('example')))
	{
		//selected
		if(e.target.classList.contains('available'))
		{
			
			listSeatsSelected.push(seat);
			e.target.setAttribute("class", "square");
			e.target.style.backgroundColor = "green";
			numSeatsSelected++;
			seatCounter.innerHTML = "Seats Selected: " + numSeatsSelected;
			displayListSeatsSelected.innerHTML = "Seats Selected: " + listSeatsSelected.toString();
		}
		//deselected
		else if(e.target.classList.contains('mine'))
		{
			listSeatsToRemove.push(seat);
			e.target.setAttribute("class", "square available");
			e.target.style.backgroundColor = "white";
		}
		else
		{	
			e.target.setAttribute("class", "square available");
			e.target.style.backgroundColor = "white";
			numSeatsSelected--;
			seatCounter.innerHTML = "Seats Selected: " + numSeatsSelected;
			var index = listSeatsSelected.indexOf(seat);
			listSeatsSelected.splice(index, 1);
			displayListSeatsSelected.innerHTML = "Seats Selected: " + listSeatsSelected.toString();
		}
		
			seatsToFile.value = listSeatsSelected.toString();
			seatsToRemove.value = listSeatsToRemove.toString();
	}
}

for(let seat of seats) {
	seat.addEventListener("click", seatSelected);
}

function submitSeats () {
	if(listSeatsSelected.length == 0)
		return false;
	else {
		return true;
	}
}
