#   AS2 Server implementation in Laravel 
##  Install laravel 

    composer create-project laravel/laravel as2-server 
    composer isntall 
    composer update 

##  Start the laravel Server 
  
     php artisan 
     php artisan key:generate 
     php artisan serve 
##  Install Jetstream and Inertia (optional)
    composer require laravel/jetstream
    php artisan vendor:publish --tag=jetstream-views
    npm install
    npm run dev
    php artisan migrate
    php artisan serve 


##  Install AS2 server : PHPAS2
    
    composer require tiamo/phpas2 --with-all-dependencies
    php artian make:model AsMessage -mr 
    php artian make:model AsPartner -mr 
    php artisan make:migration add_more_column_to_asMessages
    #Add the the following columns to table as_messages
            $table->string('id')->primary();
            $table->string('direction')->nullable();
            $table->string('sender_id');
            $table->string('receiver_id');
            $table->text('headers')->nullable();
            $table->text('payload')->nullable();
            $table->string('status')->nullable();
            $table->text('status_msg')->nullable();
            $table->string('mdn_mode')->nullable();
            $table->string('mdn_status')->nullable();
            $table->text('mdn')->nullable();
            $table->string('mic')->nullable();
            $table->boolean('signed')->nullable();
            $table->boolean('encrypted')->nullable();
            $table->boolean('compressed')->nullable();
            $table->timestamps();
    #Add the follwoing columns to the table as_partner
             $table->string('id')->primary();
            $table->string('email')->unique();
            $table->string('target_url');
            $table->text('certificate');
            $table->text('private_key');
            $table->string('private_key_pass_phrase');
            $table->string('auth_method')->nullable();
            $table->string('auth_user');
            $table->string('auth_password');
            $table->string('content_type');
            $table->boolean('compression')->default('0');;
            $table->string('compression_type')->nullable();
            $table->string('signature_algorithm')->nullable();
            $table->boolean('signature_algorithm_required')->default('0');
            $table->string('encryption_algorithm')->nullable();
            $table->string('content_transfer_encoding');
            $table->string('subject');
            $table->string('mdn_mode');
            $table->string('mdn_subject');
            $table->string('mdn_options');
            $table->timestamps();
    #Add two foreign keys to the table message i.e. (add_more_column_to_as_messages.php file in migration )
            $table->foreign('sender_id')->references('id')->on('as_partners');
            $table->foreign('receiver_id')->references('id')->on('as_partners');
    
        
##      Extend the AsPartnar and AsMessage Interface  as AsPartner and AsMessage Model 

        -   Strat the AsPartner model as follwiong 
                use AS2\MessageInterface;
                use Illuminate\Database\Eloquent\Factories\HasFactory;
                use Illuminate\Database\Eloquent\Model;
                use AS2\PartnerInterface;

                class AsPartner extends Model implements PartnerInterface
                {
                    ... 
                    ... 
                }
        -  Start the AsMessage Model as follwowing 
                namespace App\Models;
                use AS2\MessageInterface;
                use AS2\PartnerInterface;
                use Illuminate\Database\Eloquent\Factories\HasFactory;
                use Illuminate\Database\Eloquent\Model;
                use Illuminate\Database\Eloquent\Concerns\HasEvents;

                class AsMessage extends Model implements MessageInterface
                {
                    ....
                    ....
                }

##  Make an User Observer  the AsMessage Model  
        
        php artisan make:observer AsMessageObserver --model=AsMessage

##  Register the  AsMessage Observer in EventServiceProvider.php 

        - To register an observer, you need to call the observe method on the model you wish to observe. 
        You may register observers in the boot method of your application's 
        App\Providers\EventServiceProvider 
        service provider:

        - Add the follwoing line at the top of  App\Providers\EventServiceProvider
         use App\Observers\AsMessageObserver;

        - Edit the boot function as following 
                public function boot()
                {
                        //
                        //AsMessage Observer 
                        AsMessage::observe(AsMessageObserver::class);
                }


##      Exclude As2 server URIs From CSRF Protection

        - Create middleware 
          php artisan make:middleware VerifyCsrfToken
        - Add the following line of code to the middleware 
          protected $except = [
             '/as2Interface/receive'
          ];

##      Create Repositories for two models : AsMesasge and AsPartner 

        - create an folder app\Repositories  in app folder 
        - Add, create and save message as showin in the repository 
        - Create findPartnerById function in the AsPartner Repository 

##      Bind the interface and the implementation
        The last thing we need to do is bind OrderRepository to PartnerRepositoryInterface and AsMessageRepositoryInterface in Laravel's Service Container; we do this via a Service Provider. Create one using the following command.
        
        - Create RepositoryService provider 
          php artisan make:provider RepositoryServiceProvider

        - Register the RepositoryServiceProvider in  config/app.php  as below 
                 ...
                 App\Providers\JetstreamServiceProvider::class,
                /**
                * custom Service Providers 
                */
                App\Providers\RepositoryServiceProvider::class,

        

           
