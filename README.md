<p align="center">
<img src="https://banners.beyondco.de/PawelBeska%2FLaravelMapGenerator.png?theme=dark&packageManager=&packageName=&pattern=architect&style=style_1&description=Simple+repository+to+generate+maps&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg" alt="project-image"></p>

### Start date:

10.09.2022

### End date:

11.09.2022

### Installation proces

Change file name from .env.example to .env (apps/game/.env.example)

Run command <code>docker-compose build</code>

Run command <code>docker-compose up -d</code>

Run command <code>docker exec -it orders_service bash</code>

Run command <code>composer update</code>

Run command <code>php artisan key:generate</code>

Run command <code>php artisan migrate</code>

### Generating maps

Run command <code>docker-compose up -d</code>

Run command <code>php artisan test --filter=MapGenerator</code>

Maps will be generated in <code>public</code> folder

### Example maps

![test2THYCyUkCSqyW529](https://user-images.githubusercontent.com/6086510/190849838-20e9a802-7cce-493f-8867-94bce030e148.png)
![testaBgMFnuq22Xs9Wrr](https://user-images.githubusercontent.com/6086510/190849840-6d5863d7-1507-4382-9c2c-5bdd08e12fd5.png)
![testDGjcIX3eQxdHsUiJ](https://user-images.githubusercontent.com/6086510/190849842-f39d6798-953f-4d04-a9ae-d5f30d88f762.png)
![testGxbYHzdMT96V0Ck1](https://user-images.githubusercontent.com/6086510/190849843-1bfb06f7-279a-4b41-9129-664fd97eca3f.png)
![testU2aonMizQDH8CBZs](https://user-images.githubusercontent.com/6086510/190849844-01355026-cf8f-4c1d-bf40-dea8e17554ce.png)


### Testing:

Run command <code>docker-compose up -d</code>

<code>php artisan test</code>

### Technology used:

- PerlinNoise ([PerlinNoise](https://en.wikipedia.org/wiki/Perlin_noise) [PerlinNoiseLibrary](https://github.com/A1essandro/perlin-noise-generator) )

### Documentation:

- 
