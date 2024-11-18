var loq;
var route = "http://127.0.0.1:8000";
function login() {
    let userID = document.getElementById("exampleInputEmail").value;
    let password = document.getElementById("exampleInputPassword").value;
    var logindetails = {
        email: userID,
        password: password,
    };
    
//      "email": "a14@dummymail.com",
//   "password": "123"
    var url= `${route}/api/auth/user`;
    // $.ajax({
    //     type: "POST",
    //     url: `${route}/api/auth/user`,
    //     data: JSON.stringify(logindetails),
    //     contentType: "application/json",
    //     success: function (l_data) {
    //         loq = l_data;
    //         if (l_data.status_code === 200) {
    //             Swal.fire({
    //                 title: 'Login Successful',
    //                 icon: 'success',
    //                 timer: 2000,
    //                 showConfirmButton: false
    //             }).then(() => {
    //                 //if (l_data.data.role === "admin") {
    //                     window.location.href = "/table";
    //                     window.location.href = "home/table.html.twig";
    //                 // } else {
    //                 //     window.location.href = "/userdashboard";
    //                 //}
    //             });
    //         } else {
    //             Swal.fire({
    //                 icon: "error",
    //                 title: "Invalid Password",
    //                 text: l_data.message || "Please try again",
    //             });
    //         }
    //     },
    //     error: function (response) {
    //         Swal.fire({
    //             icon: "error",
    //             title: "Login Failed",
    //             text: "Invalid username or password",
    //         });
    //     },
    // });
    const requestOptions = {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json', 
              'Authorization': 'Bearer YOUR_ACCESS_TOKEN'
      
        },
        body: JSON.stringify(logindetails) 
       };
      
      fetch(url, requestOptions)
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
         
          return response.json();
        })
        .then(data => {
          console.log(data["data"]);
          if(data)
          tableData(data)
          window.location.assign("/table");
                        //    window.location.href = "home/table.html.twig";
        })
        .catch(error => {
          console.error('There was a problem with the fetch operation:', error);
        });
      
}
// function addRow(data) {
//     const table = document.getElementById('dataTable');
//     let newRow = table.insertRow();
//     let cell = newRow.insertCell();
    // // cell.innerHTML = '<i id="${chemicals[key].id}" onclick="selectForDelete(event)"  style="color:#ddd;cursor:pointer;" class="fa-solid fa-check"></i>';
    // cell.innerHTML = ` <tr> </tr>`;

    // for (let i = 0; i < data.length; i++) {
    //      cell = newRow.insertCell();
    //    if(i==0)
    //     cell.innerHTML = `<input type="text" id="in${i}" placeholder="" value=${arrCur.length+1}>`;
    //         //console.log("in"+i);
    //         else
    //     cell.innerHTML = `<input type="text" id="in${i}" placeholder="">`;
        
    // }
//     function tableData(dataOne){
//         console.log(dataOne[0].age);
// // var tr=document.createElement("tr");
// var a=document.getElementById("dataOneTable");
// for (var key=0 ;key< dataOne.length;key++) {
//     // $(document).ready(() => {
//     //     let count=1;
//     console.log(dataOne[key].id);

//     //     // Adding row on click to Add New Row button
//     //     $('#Login1').ready(function () {
//             let dynamicRowHTML = `<tr><td>${dataOne[key].id}</td><td>${dataOne[key].name}</td><td>${dataOne[key].position}</td><td>${dataOne[key].office}</td><td>${dataOne[key].age}</td><td>${dataOne[key].startDate}</td><td>${dataOne[key].salary}</td></tr>`;
//             console.log(dynamicRowHTML);
//             if(dynamicRowHTML!=null )
//             a.append(dynamicRowHTML);
//             //count++;
//     //     });
//     // });
// }
// }


function tableData(dataArray) {
    const tableBody = document.getElementById('dataTable'); // Replace with your table body ID
    if (!tableBody) {
        console.error('Table body element not found');
        return;
    }
           console.log(dataArray["data"].id);

    // Clear the table body (optional, if you want to refresh data)
    tableBody.innerHTML = '';

    // Loop through the array and create rows
    dataArray.forEach(item => {
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${item.id}</td>
            <td>${item.name}</td>
            <td>${item.position}</td>
            <td>${item.office}</td>
            <td>${item.age}</td>
            <td>${item.startDate}</td>
            <td>${item.salary}</td>
        `;
        tableBody.appendChild(newRow);
    });
}

// Sample data to test
// const sampleData = [
//     { id: 1, name: 'Airi Satou', position: 'Accountant', location: 'Tokyo', age: 25, salary: 19999 },
//     { id: 2, name: 'Angelica Ramos', position: 'CEO', location: 'London', age: 47, salary: 120000 },
// ];

// // Call the function
// tableData(sampleData);

