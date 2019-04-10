# Laravel -  Multiple Authentication
Creating Laravel Multiple Authentication System Using Default Authentication System in Laravel

# Three types of users:
- User (Default Authentication)
- Admin
- Student

You can check authentication by using the following code:

     @if(Auth::guard('admin')->check())
        //do Something
    @else
         //do Something
    @endif

    @if(Auth::guard('student')->check())
        //do Something
    @else
       //do Something

    @endif


 
