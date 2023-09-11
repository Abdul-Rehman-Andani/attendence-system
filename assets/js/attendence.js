
let presntData = [];
let absentData = [];

// function for present data
const present = (id) => {
    presntData.push(id);
    console.log(presntData.toString());
}

// function for absent data
const absent = (id) => {
    absentData.push(id);
    console.log(absentData.toString());
}