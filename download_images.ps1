# Create directories if they don't exist
New-Item -ItemType Directory -Force -Path "public/images/slider"
New-Item -ItemType Directory -Force -Path "public/images/categories"
New-Item -ItemType Directory -Force -Path "public/images/produits"

# Download slider images
Invoke-WebRequest -Uri "https://source.unsplash.com/1920x600/?sports+equipment" -OutFile "public/images/slider/slide1.jpg"
Invoke-WebRequest -Uri "https://source.unsplash.com/1920x600/?sports+action" -OutFile "public/images/slider/slide2.jpg"
Invoke-WebRequest -Uri "https://source.unsplash.com/1920x600/?fitness+equipment" -OutFile "public/images/slider/slide3.jpg"

# Download category images
Invoke-WebRequest -Uri "https://source.unsplash.com/800x600/?football" -OutFile "public/images/categories/football.jpg"
Invoke-WebRequest -Uri "https://source.unsplash.com/800x600/?basketball" -OutFile "public/images/categories/basketball.jpg"
Invoke-WebRequest -Uri "https://source.unsplash.com/800x600/?running" -OutFile "public/images/categories/running.jpg"
Invoke-WebRequest -Uri "https://source.unsplash.com/800x600/?fitness" -OutFile "public/images/categories/fitness.jpg"
Invoke-WebRequest -Uri "https://source.unsplash.com/800x600/?tennis" -OutFile "public/images/categories/tennis.jpg"

# Download sample product images
Invoke-WebRequest -Uri "https://source.unsplash.com/800x800/?football+ball" -OutFile "public/images/produits/football-1.jpg"
Invoke-WebRequest -Uri "https://source.unsplash.com/800x800/?basketball+ball" -OutFile "public/images/produits/basketball-1.jpg"
Invoke-WebRequest -Uri "https://source.unsplash.com/800x800/?running+shoes" -OutFile "public/images/produits/running-1.jpg"
Invoke-WebRequest -Uri "https://source.unsplash.com/800x800/?fitness+equipment" -OutFile "public/images/produits/fitness-1.jpg"
Invoke-WebRequest -Uri "https://source.unsplash.com/800x800/?tennis+racket" -OutFile "public/images/produits/tennis-1.jpg" 