# Recipes
Instruction to Run the project:
 
docker build -t
docker-compose up -d
php composer install
docker ps

(Please copy the container ID to the next command and in .env DB_HOST)
docker exec -it (ID) bash
php artisan migrate

on new terminal:
npm install
npm run dev    
npm run prod
npm run watch-poll  or npm run watch (depends which one works in your device in case you want edit something)