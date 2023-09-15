// // alert("Hello Good Morning");

// // var demo = () =>123;
// // alert(demo());


// /* var demo = (name,age) =>[
//     {
//         "Name ":name, 
//         "Age":age
//     }
// ]
// console.log(demo("Hello",21)); */


// /* var demo = (num) => num+1
// alert(demo(123)); */

// /* var datas = {
//     "name":"Baboo",
//     "age":21
// };
// var i = 0;
// for(let data in datas){
//     console.log(i);
//     console.log(data);
//     i++;
// } */




// //spread operator

// /* const data = [1,2,3,4];
// console.log(data);
// console.log(...data); */


// /* const data = ["Baboo","Kumar"];
// const data1 = ["@","karachi"];
// const result = [...data,...data1];
// console.log(result);  */


// /* const data = {
//     "name":"Baboo",
//     "age":21,
//     "sub":"math"
// }

// const data1 = {
//     "address":"ali town",
// }

// const result = {
//     ...data,
//     ...data1
// }
// console.log(result); */


// /* const data = [1,3,4]
// const data1 = (x,y,z) =>{
//     console.log(x,y,z);
// }
// data1(...data)
//  */




// /* const numers = ["Hello", "Hi"];
// const result = numers.map((value)=>value.toUpperCase());
// console.log(result); */


// /* const hello = ["Hello","hi"]
// const result = hello.map((value,index)=>index+2)
// console.log(result); */



// /* const hello = [1,2,3,4]
// const result = hello.map((item, hello)=>{
//     if(item%2==0){
//         return item+" is even"
//     }
//     else{
//         return item+" is odd"
//     }
// });
// console.log(result); */


// /* const data = [{
// "name":"Aslam",
// "age":21
// },
// {
// "name":"Aslam",
// "age":18
// }
// ];

// const result = data.filter((item)=>item.age>20) 
// console.log(result);
//  */


// /* const data = [{
//     "name":"suhail",
//     "age":22,
// },
// {
//      "name":"Akash",
//     "age":22,
// }
// ]

// const result =  data.find((item)=>item.name == "Baboo")
// if(result){
//     console.log(result);
// }
// else{
//     console.log("Element not found");
// } */


// /* const hello1 = [{
//     "name":"BAboo",
//     "age":22,
// },
// {
//     "name":"Akash",
//     "age":22,
// }]
// const result = hello1.findIndex((item)=>item.age === 21)


// if(result === 0 ||result === 1){
//     console.log("Element is present at : "+result);
// }
// else{
//     console.log("Element not Found...!");
// } */






// const required = (el)=>new Promise((resolve, reject)=>{
//             const value = el.value;
//             if(value.length === 0) reject("This is required!")
//             else resolve("Entry accepted")
//         });

//         onBlur = async () =>{
//             try{
//                 var input = document.querySelector("#input");
//                 console.log(input);
//                 var result = await required(input)
//                 alert(result);
//             }
//             catch(err)
//             {
//                 input.style.border = "2px solid red";
//                 input.placeholder = err;
//             }
//         }


 const data1 = Array(10);
console.log(data1);

