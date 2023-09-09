
const loadData =() => {

    fetch("http://localhost/attendence-system/teacher-data.php")
        .then((res) => res.json())
        .then((data) => {
           
            let tr = "";

            for (i in data) {
                tr += `<tr>
                    <td>${data[i].id}</td>
                    <td>${data[i].name}</td>
                    <td>${data[i].email}</td>
                    <td>${data[i].class}</td>
                    <td><button onclick='getId(${data[i].id})' value=${data[i].id}><i class="fa-solid fa-pen-to-square"></i></button></td>
                    <td><button value=${data[i].id}><i class="fa-solid fa-trash"></i></button></td>
                </tr>`;
            }

            document.querySelector("#table").innerHTML = tr;
         
        });

}

loadData();

function getId(id) {
    alert(id);
}

