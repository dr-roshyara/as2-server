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

##  Make an User Observer 
    php artisan make:observer UserObserver --model=User

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
    
        
##  


