
window.cache = new Object({
   remember: function (name, time , closure) {

       let item = localStorage.getItem(name);
       let insertTime = localStorage.getItem(name + 'remember-cache');

       if(item === null || (insertTime+ time * 1000) < new Date().getTime() ) {
           localStorage.setItem(name, closure());
           localStorage.setItem(name + 'remember-cache', new Date().getTime());
       }

       return localStorage.getItem(name);
   }
});
