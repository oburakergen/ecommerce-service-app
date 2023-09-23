
# Elle test etmek için aşağıdaki komutları kullanabilirsiniz.
### .env dosyasının bir kopyasını oluşturun
### composer install
### php artisan key:generate
### php artisan migrate:fresh
### php artisan db:seed
### php artisan serve
### php artisan queue:work

## Container background çalıştırmak için -d flagı ekleyebilirsiniz

./vendor/bin/sail up -d

## Kapsayıcının resimlerini yeniden inşa etmek istiyorsanız, bu komuta --build bayrağını ekleyin

./vendor/bin/sail up --build

## Docker'ı konteyner görüntülerini yeniden oluşturmaya zorlamak istiyorsanız, bu komuta --build bayrağını ekleyin

./vendor/bin/sail up --build

## Tüm kapları durdurmak istiyorsanız, aşağı komutu kullanabilirsiniz:

./vendor/bin/sail down

## Tüm kapları durdurmak ve kabın tüm hacimlerini kaldırmak istiyorsanız, aşağı komutu --volumes bayrağıyla kullanabilirsiniz:

./vendor/bin/sail down --volumes

## Tüm kapları durdurmak, konteynerin tüm hacimlerini kaldırmak ve projenin tüm görüntülerini kaldırmak istiyorsanız, aşağı komutu --rmi bayrağıyla kullanabilirsiniz:

./vendor/bin/sail down --rmi all

## Docker üzerindeki kurulumlarda kullanılan komutlar aşağıdaki gibidir.

docker compose up -d

## Porların çakışmaması adına mysql ve redis portlarını değiştirmek gerekiyor. Bunun için docker-compose.yml dosyasında aşağıdaki değişiklikler yapılmalıdır.

# MySQL
- "3307:3307"

# Redis
- "6380:6380"

## Apiyi test etmek için public klasörünün içinceki postman collections kullanabilirsiniz.

# Postman Collection
./public/postman_collection.json



