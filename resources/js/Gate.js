export default class Gate{

    constructor(user){
        this.user = user;
    }


    isAdmin(){
        return this.user.user_level === 'admin';
    }

    isUser(){
        return this.user.user_level === 'user';
    }
    isAManagerOrSupervisor(){
        if(this.user.user_level === 'manager' || this.user.user_level === 'supervisor'){
            return true;
        }

    }
   

    



}

