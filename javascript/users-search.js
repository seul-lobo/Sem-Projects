const searchBar = document.querySelector(".users .search input"),
searchIcon = document.querySelector(".users .search button");
usersList = document.querySelector(".users-list");

searchIcon.onclick = ()=>{
  searchBar.classList.toggle("active");
  searchIcon.classList.toggle("active");
  searchBar.focus();
//   if(searchBar.classList.contains("active")){
  searchBar.value = "";
    // searchBar.classList.remove("active");
//   }
}

searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
  if(searchTerm != ""){
    searchBar.classList.add("active");
  }
  else{
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();     //creating XML obj
  xhr.open("POST","php-backend/search.php",true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        usersList.innerHTML = data;
          
      }
    }
  }
  xhr.setRequestHeader("Content-type" , "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm); // to php

} 

setInterval(()=>{
  //Ajax
  let xhr = new XMLHttpRequest();     //creating XML obj
  xhr.open("GET","php-backend/users.php",true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
      if(xhr.status === 200){
        let data = xhr.response;
        if(!searchBar.classList.contains("active")){  //if active not contains in searchBar, then add this data
          usersList.innerHTML = data;
        }  
      }
    }
  }
  xhr.send(); // to php
},500);   //this will run frequently after 500ms