
        //Noraml functions 
        // function demo(){
        //     console.log("hi");
        // }

        //Arrow function

        // var demo = () =>{
        //     alert("Hello");
        // }

        /* var demo = ()=>{
            return 12345
        }
        alert(demo()); */
        // we can write above in below shortcut method

       /*  var demo = () => 12345
        alert(demo()); */


        //return array
        /* var demo = () => [123,321]
        console.log(demo()); */

        //return object with lengthy method
        /* var demo = () => {
            return {
                name: "Baboo",
                age:21
            }
        } */
       /*  console.log(demo());
        // return object with short method method   
        var demo = () => ({
            name: "Baboo",
            age: 21
        });
        console.log(demo()); */
         
        //Note: arrow ka bad num likhna ka mtlb return value

        // mutliple values
        /* var demo = (num, name) =>[num,name];
        console.log(demo(123,"Baboo")); */
        
        //single value
        /* var demo=num=>num+1; //first num left to right is paramenter, 2nd num is return
        console.log(demo(123)); */ // here it is orgument
         







        // let vs var difference and real uses88888888888888
        /* if(6==6)
        {
            let x = 123
            console.log(x);//can be accessed inside
        }
        console.log(x);  *///cant access outside

        /* if(6 == 6) 
        {
            const x = 123
            console.log(x);//can be accessed inside
        }
        console.log(x);//cant access outside */

        /* if (6 == 6) 
        {
            var x = 123
            console.log(x);//can be accessed inside
        }
        console.log(x);//can access outside */


        /* if (6 != 6) {
                var x = 123
                console.log(x);
            }
        console.log(x);//undefined; means not declared */
        
        //note: const cant be updated
        /* const x = 12
        x = 14
        console.log(x); */ //Uncaught TypeError: Assignment to constant variable.
    
        //var, let can be updated
        //funcin should be constent qn ka wo update nhi hota ha 
        //var is used, where we want to update something

        //var zyda memory consume krta ha 
        //let const block(function, condition) scope hota han, ca't acess outside
    


        //For of and for in loop in es6

        // for of : for array
        // for in : for Objects

        //old method
        /* const data = ["Baboo", "Akash", 321, 123, "maria"]
        var i;
        for(i=0;i<data.length;i++){
            console.log(data[i])
        } */


        //new method
        /* const datas = ["Baboo", "Akash", 321, 123, "maria"]
            var i = 0;
        for(let data of datas){
            // console.log(i);
            console.log(data);
            i++
        } */

        /* array = for of
        object = for of */

        //For in loop
        /* const datas = {
            name: "Baboo",
            roll:21,
            subject:"math" 
        }
        for(let key in datas ){
            // console.log(datas[key]);
            console.log({
                // key: key,
                key,
                value: datas[key]
        });
        } */

        //Spread Operator

        /* const data = ['Baboo', "kumar", "Heerani"]
        console.log(data); 
        console.log(...data); */ //spread operator, get array values without index

        //Join two array using spread operator

       /*  const data1 = ["Baboo","Kumar"];
        const data2 = ["@","Karachi"];
        const result = [...data1,...data2]
        console.log(result); */

        //objects using spread operator
        /* const data = {
            name: "hello",
            roll: 123
        }
        console.log(...data); */ // errro: Spread syntax requires ...iterable[Symbol.iterator] to be a function

        // Join two objects using spread operator
        /* const data = {
            name: "Baboo",
            rol:123
        }
        const final = {
            subject: "chemistry",
        }
        const result = {
           ...final,
           ...data
        }
        console.log(result); */


        /* const data = [1,2,3]
        const result = (x,y,z)=>{
            console.log(x,y,z);
        }
        result(...data) */


        //Map Functions

        /* const names = ['baboo', 'kumar','heerani'];
        // const result = names.map(()=>"map")
        // const result = names.map((item, index)=>item.toUpperCase())
        // const result = names.map((item, index)=>index+1)
        const result = names.map((item, index)=>item.length)
        console.log(result); */


        /* const datas = [2,5,9,8,6]
        const result = datas.map((item) =>{
            if(item%2==0)
                return item+ " is Even";
            else
                return item+" is Odd"; 
        });
        console.log(result); */


        //Filter vs Map Functions

        //map 
        /* const data = [12,14,56,7];
        const result = data.map((num)=>{
            if(num > 0)
            return num
            else return "smaller";
        }); */



        //to avoid from above lengthy code we use filter, 7 chota ha lekin uskelay code nhi likha ha 
        /* const result = data.filter((num) =>num >10)
        console.log(result); */


       /*  const data = [
            {
                name: "Baboo",
                roll:13
            },
            {
                name: "akash",
                roll:19,

            },
        ]
        const result = data.filter((item) =>item.roll >10)
        console.log(result); */


        //find() and findIndex() functions in es6

        /* 
        
        const data1 = [{name:"Baboo",roll:13},{name:"akash",roll:19}]
        const result1 = data.find((item)=>item.name=="Baboo")
        console.log(result1);
      
        
        */

        //findIndex: array ka kis index pa match kr rha ha
        /* const data = [{name:"Baboo",roll:13},{name:"akash",roll:19}]
        const result = data.findIndex((item)=>item.name == "Baboo")
        console.log(result);


        
 */

        //Promise then cache block in ES6

        /* const checkUser = (email)=>new Promise((resolve, reject)=>{
            let username = "baboo@gmail.com";
            if(username === email) resolve("User Found ! ")
            else reject("user not found")
        })
        checkUser("1babsdfsdfoo@gmail.com")
        .then((res)=>{
            console.log(res);
        })
        .catch((err)=>{
            console.log(err);
        }); */



        //startsWidth() endsWith() rest Parameters in ES6
        
        /* const data = "My name is Baboo"
        const matched = data.startsWith("my")
        alert(matched) */


       /*  const data = "My name is Baboo"
        const matched = data.endsWith("saurav")
        alert(matched)
 */


        // /rest
        /* const control = (name, roll, subject, ...rest)=>{
            return {
                name, 
                roll,
                subject,
                ...rest
            }
        }
        let extra = {
            marks:"80%",
            grade: "A",
            date: new Date()
        }
        console.log(control("saurav",12, "maths", extra)); */



        // Promise Try Catch Async Await in ES6

        /* const required = (el)=>new Promise((resolve, reject)=>{
            const value = el.value;
            if(value.length === 0) reject("This is required!")
            else resolve("Entry accepted")
        });

        const onBlur = async () =>{
            try{
                const input = document.querySelector("#input");
                const result = await required(input)
                alert(result);
            }
            catch(err)
            {
                input.style.border = "2px solid red";
                input.placeholder = err;
            }
        } */
        //sucess:resolve
        //reject: failure


        //Array() fill() from() push() keys() in ES6

        // Array : 
       /*  const data1 = Array(10);
        console.log(data1); */

        /* const data1 = Array(10);
        data1[0] = "1";
        data1[1] = "2";
        console.log(data1); */

        //Fill
        /* const data = Array(10).fill("a")
        // fill: array ke hr index pa a store hoga  
        console.log(data);
        data[1] = "aa";
        data[2] = "ab";
        data[3] = "cc";;
        console.log(data); */


        //push: add one by one
        /* const data = Array()
        data.push("abc1");
        data.push("abc2");
        data.push("abc3");
        console.log(data);
 */

        //From
        /* const data = Array.from('asdf');
        console.log(data);  */

       /*  const data = [
            "123",
            "321",
        ]
        const keys = data.keys();
        for(let key of keys){
            console.log(key);
        } */

        

        // Module Import Export Default Vs Export in ES6
        // ek js ke file ko dosre js file man open krna ko bolta han module;

        /* import {students, teachers, employees} from './data.js';
        console.log(students, teachers, employees); */
        
        //import ka aga name hum apne mrzi sa likh sakhta han


        // Fetch API Function HTTP Request in ES6
        /* 
        http: request types : 4
        1. get: // when you want to get data from server
        2. post//store data on server
        3. put/patch: update data 

        
        */

        // const get = ()=>{
        //     fetch('https://dummyjson.com/products')
        //     .then((response)=>console.log(response))
        //     .catch((err)=>console.log(err));
        // }
      
        //Object .entries() function in ES6
        //array ka sath index pa print kraga in loop

        /* const data = [
            "hi",
            "Hi",
            "Hello",
        ]
        const itt = data.entries()
        for(let item of itt){
            console.log(item);
        } */


        //yield and pause functions
        //jb chahio function ko ruko and chlio
        //jahn pr pause krna ha wo yield use krenga
       
        /* function* Generator(){
        yield  1;
        yield  2;
       }
       const gen = Generator()
       console.log(gen.next().done); // false: abhi value pra han
         console.log(gen.next());
        console.log(gen.next().value); //1
        console.log(gen.next().value); //2
        console.log(gen.next().done); */ //true: data khtm hogya han, end pa call kya ha value print krdeya










































