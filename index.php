<?php

use Dotenv\Dotenv;

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <!-- <link rel="icon" type="image/svg+xml" href="/vite.svg" /> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Portfolio of Ayush Bajracharya, a frontend developer." />
  <title>Ayush Bajracharya | Portfolio</title>

  <!-- preload images -->
  <link rel="preload" href="/assets/images/profile.png" as="image" type="image/png" crossorigin="anonymous" />
  <!-- preload images -->

  <!-- preload fonts -->
  <link rel="preload" href="/assets/fonts/rajdhani/Rajdhani-Bold.woff" as="font" type="font/woff" crossorigin="anonymous" />
  <link rel="preload" href="/assets/fonts/rajdhani/Rajdhani-Bold.woff2" as="font" type="font/woff2" crossorigin="anonymous" />
  <link rel="preload" href="/assets/fonts/rajdhani/Rajdhani-Light.woff" as="font" type="font/woff" crossorigin="anonymous" />
  <link rel="preload" href="/assets/fonts/rajdhani/Rajdhani-Light.woff2" as="font" type="font/woff2" crossorigin="anonymous" />
  <link rel="preload" href="/assets/fonts/rajdhani/Rajdhani-Medium.woff" as="font" type="font/woff" crossorigin="anonymous" />
  <link rel="preload" href="/assets/fonts/rajdhani/Rajdhani-Medium.woff2" as="font" type="font/woff2" crossorigin="anonymous" />
  <link rel="preload" href="/assets/fonts/rajdhani/Rajdhani-Regular.woff" as="font" type="font/woff" crossorigin="anonymous" />
  <link rel="preload" href="/assets/fonts/rajdhani/Rajdhani-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous" />
  <link rel="preload" href="/assets/fonts/rajdhani/Rajdhani-SemiBold.woff" as="font" type="font/woff" crossorigin="anonymous" />
  <link rel="preload" href="/assets/fonts/rajdhani/Rajdhani-SemiBold.woff2" as="font" type="font/woff2" crossorigin="anonymous" />
  <!-- preload fonts -->
  
  <?php if ($_ENV['APP_ENV'] == 'local'): ?>
    <link rel="stylesheet" href="http://localhost:5173/src/css/style.css" />
    <script type="module" src="http://localhost:5173/src/script/main.ts" defer></script>
  <?php elseif ($_ENV['APP_ENV'] == 'production'): ?>
    <link rel="stylesheet" href="/dist/assets/style.css" />
    <script type="module" src="/dist/assets/main.js" defer></script>
  <?php endif; ?>
</head>

<body class="text-white font-rajdhani bg-black">
  <header class="fixed right-8 top-1/2 -translate-y-1/2 z-1 max-lg:hidden">
    <nav class="bg-dark-1/50 backdrop-blur-0.5xs rounded-full shadow-aside-social p-2">
      <ul class="flex flex-col gap-2 relative before:bg-white before:w-full before:aspect-square before:absolute before:rounded-full before:top-[var(--top)] before:transition-[top] duration-500 header-link-list">
        <li>
          <a class="relative p-3 rounded-full leading-0 block hover:bg-white/10 transition-colors duration-500 header-link scroll-link [.active]:text-dark-1 active"
            href="#home" aria-label="Home" title="Home">
            <iconify-icon icon="line-md:home" width="20" height="20"></iconify-icon>
          </a>
        </li>
        <li>
          <a class="relative p-3 rounded-full leading-0 block hover:bg-white/10 transition-colors duration-500 header-link scroll-link [.active]:text-dark-1"
            href="#about" aria-label="about" title="About">
            <iconify-icon icon="icon-park-outline:user" width="20" height="20"></iconify-icon>
          </a>
        </li>
        <li>
          <a class="relative p-3 rounded-full leading-0 block hover:bg-white/10 transition-colors duration-500 header-link scroll-link [.active]:text-dark-1"
            href="#resume" aria-label="resume" title="Resume">
            <iconify-icon icon="qlementine-icons:resume-16" width="20" height="20"></iconify-icon>
          </a>
        </li>
        <li>
          <a class="relative p-3 rounded-full leading-0 block hover:bg-white/10 transition-colors duration-500 header-link scroll-link [.active]:text-dark-1"
            href="#skills" aria-label="skills" title="Skills">
            <iconify-icon icon="et:tools" width="20" height="20"></iconify-icon>
          </a>
        </li>
        <li>
          <a class="relative p-3 rounded-full leading-0 block hover:bg-white/10 transition-colors duration-500 header-link scroll-link [.active]:text-dark-1"
            href="#portfolio" aria-label="portfolio" title="Portfolio">
            <iconify-icon icon="dashicons:portfolio" width="20" height="20"></iconify-icon>
          </a>
        </li>
        <li>
          <a class="relative p-3 rounded-full leading-0 block hover:bg-white/10 transition-colors duration-500 header-link scroll-link [.active]:text-dark-1"
            href="#contact" aria-label="contact" title="Contact">
            <iconify-icon icon="ph:handshake" width="20" height="20"></iconify-icon>
          </a>
        </li>
      </ul>
    </nav>
  </header>
  <div class="fixed right-6 top-6 z-1 lg:hidden" id="mobile-menu-btn">
    <button class="leading-0 bg-white text-dark-1 rounded-full p-3">
      <iconify-icon icon="line-md:grid-3" width="20" height="20"></iconify-icon>
    </button>
  </div>
  <dialog
    class="fixed top-0 left-auto right-0 h-[100dvh] bg-dark-4 z-1 text-white w-full max-w-80 backdrop:bg-dark-5/50 starting:translate-x-full transition-transform duration-500 [.closing]:translate-x-full backdrop:starting:opacity-0 backdrop:transition-opacity backdrop:duration-500 [.closing]:backdrop:opacity-0"
    id="mobile-menu">
    <div class="h-full">
      <div class="h-full pt-12.5 px-10 pb-10 flex flex-col justify-between">
        <div class="">
          <div class="flex justify-between items-end">
            <h2 class="text-lg">Menu</h2>
            <button id="mobile-menu-close-btn">
              <iconify-icon icon="system-uicons:cross" width="24" height="24"></iconify-icon>
            </button>
          </div>
          <nav class="mt-13">
            <ul class="space-y-8">
              <li>
                <a class="flex gap-3 scroll-link" href="#home">
                  <iconify-icon icon="line-md:home" width="20" height="20"></iconify-icon>
                  <span>Home</span>
                </a>
              </li>
              <li>
                <a class="flex gap-3 scroll-link" href="#about">
                  <iconify-icon icon="icon-park-outline:user" width="20" height="20"></iconify-icon>
                  <span>About</span>
                </a>
              </li>
              <li>
                <a class="flex gap-3 scroll-link" href="#resume">
                  <iconify-icon icon="qlementine-icons:resume-16" width="20" height="20"></iconify-icon>
                  <span>Resume</span>
                </a>
              </li>
              <li>
                <a class="flex gap-3 scroll-link" href="#skills">
                  <iconify-icon icon="et:tools" width="20" height="20"></iconify-icon>
                  <span>Skills</span>
                </a>
              </li>
              <li>
                <a class="flex gap-3 scroll-link" href="#portfolio">
                  <iconify-icon icon="dashicons:portfolio" width="20" height="20"></iconify-icon>
                  <span>Portfolio</span>
                </a>
              </li>
              <li>
                <a class="flex gap-3 scroll-link" href="#contact">
                  <iconify-icon icon="ph:handshake" width="20" height="20"></iconify-icon>
                  <span>Get In Touch</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <div class="">
          <div class="">
            <h2 class="text-lg">My Socials</h2>
          </div>
          <?php
          $socials = [
            [
              'name' => 'Gitlab',
              'icon' => 'ph:gitlab-logo-simple-bold',
              'url' => ''
            ],
            [
              'name' => 'Github',
              'icon' => 'line-md:github',
              'url' => ''
            ],
            [
              'name' => 'Linkedin',
              'icon' => 'line-md:linkedin',
              'url' => ''
            ],
            [
              'name' => 'Instagram',
              'icon' => 'line-md:instagram',
              'url' => ''
            ],
            [
              'name' => 'Facebook',
              'icon' => 'line-md:facebook',
              'url' => ''
            ],
          ];
          ?>
          <div class="flex mt-7 gap-2">
            <?php foreach ($socials as $social): ?>
              <a title="<?= $social['name'] ?>" aria-label="<?= $social['name'] ?>" href="<?= $social['url'] ?>"
                class="w-10 aspect-square grid place-items-center bg-white/10 hover:bg-white hover:text-dark-1 transition-colors duration-500 rounded-full shadow-aside-social backdrop-blur-0.5xs">
                <iconify-icon icon="<?= $social['icon'] ?>" width="18" height="18"></iconify-icon>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </dialog>
  <div class="" id="smooth-wrapper">
    <div class="container" id="smooth-content">
      <div
        class="grid gap-x-20 max-xl:grid-rows-[auto_auto] max-xl:grid-cols-[minmax(0,768px)] max-2xl:grid-cols-[400px_1fr] grid-cols-[450px_1fr] justify-center">
        <div class="max-xl:py-16 py-22.5">
          <aside class="p-10 rounded-3xl bg-dark-1 shadow-aside sticky top-8" id="aside">
            <div class="rounded-2xl overflow-hidden max-xl:max-w-80 mx-auto">
              <img class="aspect-square w-full" src="/assets/images/profile.png" alt="">
            </div>
            <div class="mt-16 text-center">
              <a class="text-grey max-sm:text-xl text-2xl"
                href="mailto:ayushbajracharya02@gmail.com">ayushbajracharya02@gmail.com</a>
            </div>
            <div class="text-center mt-3">
              <address>Kumaripati, Lalitpur</address>
            </div>
            <div class="flex justify-center mt-8 gap-2">
              <?php foreach ($socials as $social): ?>
                <a title="<?= $social['name'] ?>" aria-label="<?= $social['name'] ?>" href="<?= $social['url'] ?>"
                  class="w-10 aspect-square grid place-items-center bg-white/10 hover:bg-white hover:text-dark-1 transition-colors duration-500 rounded-full shadow-aside-social backdrop-blur-0.5xs">
                  <iconify-icon icon="<?= $social['icon'] ?>" width="18" height="18"></iconify-icon>
                </a>
              <?php endforeach; ?>
            </div>
            <div class="grid mt-17.5">
              <a href="#contact" class="btn rounded-full">
                <span class="">Get In Touch</span>
              </a>
            </div>
          </aside>
        </div>
        <main class="max-xl:max-w-[unset] max-2xl:max-w-2xl max-w-3xl mx-auto w-full">
          <section class="max-xl:py-16 py-22.5" id="home">
            <div class="">
              <h2 class="text-lg">Introduction</h2>
            </div>
            <div class="mt-7.5">
              <p class="text-6.5xl font-medium">Hi, I'm Ayush Bajracharya.</p>
            </div>
            <div class="mt-5">
              <p class="">
                A passionate coder, eager learner who wants to keep up with contantly changing tech and use that
                knowledge
                to engineer functional experiences.
              </p>
            </div>
            <div class="">
              <!-- spinning link to projects -->
            </div>
            <div class="flex mt-14 gap-25">
              <div class="">
                <p class="text-7xl">1+</p>
                <p class="uppercase mt-4">Years of experience</p>
              </div>
              <div class="">
                <p class="text-7xl">18+</p>
                <p class="uppercase mt-4">Projects Completed</p>
              </div>
            </div>
          </section>
          <section class="max-xl:py-16 py-22.5" id="about">
            <div class="">
              <h2 class="text-lg">
                About Me
              </h2>
            </div>
            <div class="mt-7.5">
              <p class="text-6.5xl font-medium">
                Who am I?
              </p>
            </div>
            <div class="mt-5">
              <p>
                I'm Ayush Bajracharya, a frontend developer currently building modern, responsive interfaces at Capital
                Eye Nepal. While I specialize in crafting web experiences, I'm also an eager learner exploring other
                areas
                of IT to grow as a well-rounded tech professional.
              </p>
            </div>
          </section>
          <section class="max-xl:py-16 py-22.5" id="resume">
            <div class="">
              <h2 class="text-lg">
                Resume
              </h2>
            </div>
            <div class="mt-7.5">
              <p class="text-6.5xl font-medium">
                Education & Experience
              </p>
            </div>
            <div class="mt-5">
              <?php $experiences = [
                ['institution' => 'Capital Eye Nepal', 'role' => 'Frontend Developer', 'from' => '2023', 'to' => 'Present'],
                ['institution' => "St. Xavier's College", 'role' => 'Bachelor of Information Technology', 'from' => '2019', 'to' => '2024']
              ]; ?>
              <ol class="divide-y divide-white/14" reversed>
                <?php foreach ($experiences as $experience): ?>
                  <li class="pt-4.5 pb-6">
                    <div class="group">
                      <div class="mb-0.5">
                        <p class="text-light-1/50 max-sm:text-lg text-xl"><?= $experience['institution'] ?></p>
                      </div>
                      <div
                        class="flex group-hover:text-primary transition-colors duration-500 justify-between items-end gap-2">
                        <span class="max-sm:text-xl text-2xl"><?= $experience['role'] ?></span>
                        <span class="bg-dark-3/50 rounded-full py-1.5 px-6 shrink-0">
                          <?= $experience['from'] ?> - <?= $experience['to'] ?>
                        </span>
                      </div>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ol>
            </div>
          </section>
          <section class="max-xl:py-16 py-22.5" id="skills">
            <div class="">
              <h2 class="text-lg">
                Skills
              </h2>
            </div>
            <div class="mt-7.5">
              <p class="text-6.5xl font-medium">
                What I Can Do
              </p>
            </div>
            <div class="mt-5">
              <?php $skills = [
                [
                  'icon' => 'vscode-icons:file-type-html',
                  'name' => 'HTML',
                  'level' => 'Intermediate'
                ],
                [
                  'icon' => 'vscode-icons:file-type-css',
                  'name' => 'CSS',
                  'level' => 'Intermediate'
                ],
                [
                  'icon' => 'vscode-icons:file-type-js',
                  'name' => 'Javascript',
                  'level' => 'Intermediate'
                ],
                [
                  'icon' => 'vscode-icons:file-type-typescript',
                  'name' => 'Typescript',
                  'level' => 'Intermediate'
                ],
                [
                  'icon' => 'vscode-icons:file-type-vite',
                  'name' => 'Vite',
                  'level' => 'Intermediate'
                ],
                [
                  'icon' => 'devicon:tailwindcss',
                  'name' => 'Tailwind',
                  'level' => 'Intermediate'
                ],
                [
                  'icon' => 'logos:react',
                  'name' => 'ReactJS',
                  'level' => 'Begineer'
                ],
                [
                  'icon' => 'devicon:nextjs',
                  'name' => 'NextJS',
                  'level' => 'Begineer'
                ],
                [
                  'icon' => 'devicon:bootstrap',
                  'name' => 'Bootstrap',
                  'level' => 'Intermediate'
                ],
              ]; ?>
              <div class="grid max-md:grid-cols-[repeat(auto-fill,minmax(0,150px))] justify-center grid-cols-4 gap-6">
                <?php foreach ($skills as $skill): ?>
                  <div class="">
                    <div class="py-13.5 border-dark-2/50 border-2 rounded-full">
                      <div class="text-center">
                        <iconify-icon icon="<?= $skill['icon'] ?>" width="72" height="72"></iconify-icon>
                      </div>
                      <div class="mt-7.5">
                        <p class="text-3xl text-center">
                          <?= $skill['name'] ?>
                        </p>
                      </div>
                    </div>
                    <div class="mt-5">
                      <p class="text-center font-medium"><?= $skill['level'] ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </section>
          <section class="max-xl:py-16 py-22.5" id="portfolio">
            <div class="">
              <h2 class="text-lg">
                Portfolio
              </h2>
            </div>
            <div class="mt-7.5">
              <p class="text-6.5xl font-medium">
                Featured Projects
              </p>
            </div>
            <div class="mt-5">
              <?php
              $projects = [
                [
                  'name' => 'Changan Nepal',
                  'url' => 'https://changannepal.com/',
                  'image' => '/assets/images/projects/changan-nepal.png',
                  'technologies' => [
                    'Bootstrap',
                    'SCSS',
                    'Javascript',
                    'React',
                    'Vite'
                  ],
                ],
                [
                  'name' => 'Papadisquo',
                  'url' => 'http://www.papadisquo.com.au/',
                  'image' => '/assets/images/projects/papadisquo.png',
                  'technologies' => [
                    'Bootstrap',
                    'SCSS',
                    'Javascript',
                  ],
                ],
                [
                  'name' => 'Kodali',
                  'url' => 'https://kodaliventures.com/',
                  'image' => '/assets/images/projects/kodali.png',
                  'technologies' => [
                    'Bootstrap',
                    'SCSS',
                    'Javascript',
                    'Vite',
                    'Figma',
                  ],
                ],
                [
                  'name' => 'Red Bull Nepal',
                  'url' => 'https://redbull-nepal.com/',
                  'image' => '/assets/images/projects/redbull.png',
                  'technologies' => [
                    'Bootstrap',
                    'SCSS',
                    'Javascript',
                    'Vite',
                  ],
                ],
              ]
              ?>
              <ul class="space-y-15">
                <?php foreach ($projects as $project): ?>
                  <li>
                    <div class="">
                      <div class="aspect-video overflow-hidden relative rounded-3xl group">
                        <div class="h-full">
                          <img
                            class="h-full w-full object-cover object-top group-hover:object-bottom transition-[object-position] duration-3500"
                            loading="lazy" src="<?= $project['image'] ?>" alt="">
                        </div>
                        <div class="flex absolute bottom-5 left-5 gap-2.5">
                          <?php foreach ($project['technologies'] as $technology): ?>
                            <div
                              class="bg-white/60 py-2 px-5 rounded-full text-black font-medium group-hover:bg-black/20 backdrop-blur-md group-hover:text-white transition-color duration-500">
                              <?= $technology; ?>
                            </div>
                          <?php endforeach; ?>
                        </div>
                      </div>
                      <div class="mt-7.5">
                        <h3 class="text-3xl">
                          <a class="relative after:absolute after:left-0 after:-bottom-1 after:h-0.5 after:bg-white after:w-0 hover:after:w-full after:transition-[width] after:duration-500"
                            target="_blank" href="https://changannepal.com/">
                            Changan Nepal
                          </a>
                        </h3>
                      </div>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </section>
          <section class="max-xl:py-16 py-22.5" id="contact">
            <div class="p-10 rounded-3xl bg-dark-1 shadow-aside">
              <div class="">
                <p class="text-6.5xl font-medium">
                  Get In Touch
                </p>
              </div>
              <div class="">
                <form>
                  <div class="space-y-9">
                    <div class="">
                      <label class="form-label" for="name">Your Name</label>
                      <input class="form-input" type="text" id="name" name="name" placeholder="Enter your name."
                        required />
                      <em class="form-error mt-1">Your Name is Required.</em>
                    </div>
                    <div class="">
                      <label class="form-label" for="phonenumber">Your Contact Number</label>
                      <input class="form-input" type="number" id="phonenumber" name="phonenumber"
                        placeholder="Enter your contact number." />
                      <em class="form-error mt-1">Please enter a valid contact number.</em>
                    </div>
                    <div class="">
                      <label class="form-label" for="email">Your Email</label>
                      <input class="form-input" type="email" id="email" name="email"
                        placeholder="Enter your email address." required />
                      <em class="form-error mt-1">Email Address is required.</em>
                    </div>
                    <div class="">
                      <label class="form-label" for="message">Your Message</label>
                      <textarea class="form-input" name="message" id="message"
                        placeholder="Enter a message."></textarea>
                      <em class="form-error mt-1">Email Address is required.</em>
                    </div>
                    <div class="grid max-sm:grid-cols-1 grid-cols-2">
                      <button class="btn btn-white rounded-full">
                        <span>
                          Send Message
                        </span>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </main>
      </div>
    </div>
  </div>
</body>

</html>