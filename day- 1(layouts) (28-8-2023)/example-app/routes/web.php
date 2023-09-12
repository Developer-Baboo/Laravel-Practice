<?php
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return view('welcome');
});


// first parameter: route name, / -->represent home page in url
// us ka aga annonymous function ha
//welcome name ha file ka

//we can open laravel files in 3 ways
// left man jio folder man jio phir file ko click kro
//ctrl+p search file
// upper welcome pa click krka ap file ko open kr sakhta han



//laravel man html ke sare file blade template ko use krte han

// Route::get('/post', function () {
//     return view('post');
// });



// Route::get('/post', function () {
//     return "<h1>Post 1 Page</h1>"; //direct html hum is trha likh sakhta han
// });



// Route::view('/post', 'post'); hum rout ko is trh bhi likh sakhta han first rroute name and second file ka name



// Route::get('/hello', function () { //user ko url man hello nazr ayaga lekin file actually post ke hogii
//     return view('post');
// });



// Route::get('/post', function () {
//     return view('post'); // practiced thsi for anchor tag
// });



// Route::get('/post/firstpost', function () { //sub route of post
//     return view('firstpost'); // view file which is actually displaying in browser
// });


///second vidoe == routing paremetne and constrint //////////////////



// Route::get('/post/{id}', function (string $id){// user yahn pr jo value as a paramenter send kraga to wo hum function ko pass krenga phir wo us ko display bhi krenga
//     return "<h1>Post Id: ".$id."</h1>";
// });



// Route::get('/post/{id?}', function (string $id = null){ // agr user koe value daga to if chalga agr nhi daga to else chlaga, ? and NULL -->represent optional alue
//     if($id){
//         return "<h1>Post Id: ".$id."</h1>";
//     }
//     else{
//         return "<h1>No Post Id Found </h1>";
//     }

// });

/*
Route::get('/post{id?}', function (string $id = null){
    if($id){
        return "<h1>Post id found is: </h1>".$id;
    }
    else{
        return "<h1>Sorry post id not found</h1>";
    }
}); */



//Send Multiple values in paramenter
// Route::get('/post/{id?}/comment/{commentid?}', function (string $id = null, string $comment = null){ // agr user koe value daga to if chalga agr nhi daga to else chlaga, ? and NULL -->represent optional alue
//     if($id){
//         return "<h1>Post Id: ".$id."</h1><h1>Comment Id: ".$comment."</h1>";
//     }
//     else{
//         return "<h1>No Post Id Found </h1>";
//     }

// });



//user jo value send kra wo numeric ho
// Route::get('/post/{id}', function (string $id){
//     if($id){
//         return "<h1>Post Id: ".$id."</h1>";
//     }
//     else{
//         return "<h1>No Post Id Found </h1>";
//     }

// })->whereNumber('id'); // where you can use whereAlphaNumeric
//->whereIn('id', ['movie', 'song', 'painting']); // user in tenoon man sa ek value dala otherwise 404 error show hoga





//video 7 Named routes and Route Groups

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/about', function () {
    return view('about');
});

Route::get('/post', function () {
    return view('post');
});

// Route::get('/posts', function () { // agr hum post ke jagha posts likhega to jis jis jagah hum na post use kya ha wo nhi chelnga to isleya hum named route use krta han
//     return view('post');
// })->name('mypost');


// Route::redirect('/about','/test', 301); //301 redirection is prement it is used by seo
//user agr about ko open kraga to test html file open hogii
//qn ka bad man hum na about ko change krka test krdya lekin user ko yad about tha







//////////Laravel Route Groups //////////////////////
// routes ka group bnata han

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// Route::get('page/about', function () {
//     return "<h1>About Page</h1>";
// });

// Route::get('page/gallery', function () {
//     return "<h1>Gallery Page</h1>";
// });

// Route::get('page/post/firstpost', function () {
//     return "<h1>First Post Page</h1>";
// });

//upper tenoon routes man ek chez common ha wo ha page route
// to qn na hum inka group bna dan

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::prefix('page')->group(function(){
//     Route::get('/about', function () {
//         return "<h1>About Page</h1>";
//     });

//     Route::get('/gallery', function () {
//         return "<h1>Gallery Page</h1>";
//     });

//     Route::get('/post/firstpost', function () {
//         return "<h1>First Post Page</h1>";
//     });
// });





// Route::fallback(function(){
//     return "<h1>Page Not Found.</h1>";
// });


//Blade Template Tutorial 9
/* Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', function () {
    return view('post');
});

Route::get('/about', function () {
    return view('about');
});
 */



/*

 */

 /*

 */



