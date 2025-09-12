

# QuranHome — Online Qur’an Academy  
*(Laravel 12 / PHP 8.3)*

QuranHome is a **dynamic Laravel 12 platform** for remote Qur’an education.  
It enables **live 1-to-1 or small group classes**, structured learning tracks (Qaida, Nazra, Hifz, Tajweed, Tafseer), certified teacher management, scheduling, progress tracking, payments, and donations.  

Everything is **fully dynamic** — including homepage sections, course content, events, blog, podcasts, audio library, and even the footer.


## 📖 Business Idea

QuranHome was built to make authentic Qur’an education accessible worldwide.  
It solves the challenges of **finding reliable teachers**, **time-zone constraints**, and **progress visibility** for parents.

- **Learners**: Kids & adults, beginners to advanced.  
- **Value**: Safe, structured, flexible, certified scholars.  
- **Revenue**: Tuition subscriptions, upsells (1-to-1 Tajweed, intensive Hifz), sibling discounts, and donation campaigns.  
- **Trust**: Blogs, podcasts, events, audio recitations, and visible community impact.  


## ⚙️ Features

- ✅ **Super Admin Panel**  
  - CRUD: Courses, Teachers, Books, Students, Batches, Sessions  
  - Manage blog, podcasts, events, donation campaigns  
  - Control site-wide settings (logo, menus, footer, SEO, policies)  
  - Monitor classes live or via recordings  

- ✅ **Teacher Management**  
  - Profiles, certifications, availability JSON  
  - Assigned to batches & sessions  
  - Take attendance, grade, upload lesson materials  

- ✅ **Courses & Batches**  
  - Structured tracks (Qaida, Nazra, Hifz, Tajweed, Tafseer)  
  - Batch scheduling, time-zone aware sessions  
  - Live meeting links (Zoom/Google Meet)  

- ✅ **Student & Parent Portal**  
  - Free trial sign-up → convert to subscription  
  - View schedule, join classes, access progress reports  
  - Attendance history & payments dashboard  

- ✅ **Donations**  
  - Campaign goals & live progress bars  
  - One-time & recurring sadaqah/Zakat  
  - Receipts emailed automatically  

- ✅ **Content & Media**  
  - Blog + Podcasts with SEO fields  
  - Audio library (recitations) with built-in player  
  - Events with countdown & CTAs  

- ✅ **Dynamic Site CMS**  
  - Manage hero sections, courses, community counters  
  - Footer: contact, socials, links — all editable from settings  

- ✅ **Prayer Times API**  
  - Cached per city daily  
  - Displayed dynamically on the homepage  


## 👥 Roles & Permissions

- **Super Admin** → Full CRUD, settings, site control, payments, donations  
- **Admin/Staff** → Manage enrollments, reports, content (restricted)  
- **Teacher** → Sessions, attendance, student notes, materials  
- **Parent/Student** → Join classes, view reports, billing, reschedules  

*(Powered by `spatie/laravel-permission`)*


## 🗂️ Domain Model (Simplified ERD)



User ─┐
├─< Teacher
└─< Student

Course ─< CourseBatch ─< Session ─< Attendance
Course ─< CourseBook >─ Book

Enrollment >─ Student
Enrollment >─ CourseBatch

Payment (subscription/one-off)
Donation >─ Campaign

Post (blog/podcast)
Media (files/audio)
Event
Setting (footer, menus, SEO, prayer city)

`


## 🛠️ Tech Stack

- **Framework**: Laravel 12 (PHP 8.3)  
- **Database**: MySQL 8 / PostgreSQL 14+  
- **Cache/Queue**: Redis  
- **Frontend**: Blade + Bootstrap 5 / Alpine.js  
- **Payments**: Stripe / PayPal  
- **Media**: spatie/laravel-medialibrary  
- **PDF Reports**: barryvdh/laravel-dompdf  
- **Auth**: Laravel Breeze/Fortify  
- **Broadcasting**: Laravel WebSockets / Pusher  


## 🚀 Installation

bash
git clone https://github.com/codefixxer/quran-accademy.git
cd quranhome
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
npm install && npm run build
`

Seeded data includes:

* Super Admin: `admin@quranhome.test / password`
* Sample courses, teachers, events, posts, donations, footer settings


## ⚡ Configuration (`.env` essentials)

dotenv
APP_NAME=QuranHome
APP_ENV=local
APP_URL=http://localhost
APP_TIMEZONE=Asia/Karachi

DB_CONNECTION=mysql
DB_DATABASE=quranhome

STRIPE_KEY=pk_live_xxx
STRIPE_SECRET=sk_live_xxx

PRAYER_API_DRIVER=aladhaan
PRAYER_DEFAULT_CITY=Karachi



## ▶️ Running

bash
php artisan serve
php artisan queue:work
php artisan schedule:work


Production cron job:


* * * * * php /var/www/quranhome/artisan schedule:run >> /dev/null 2>&1



## 📦 Key Modules

### Courses & Sessions

* Super Admin defines courses → batches → auto-generated sessions
* Each session stores `join_url`, `recording_url`, attendance

### Teachers

* CRUD teachers, assign to sessions
* Availability scheduling for trials

### Books

* CRUD Islamic books, attach to courses

### Progress Reports

* Attendance + quiz scores → monthly PDFs
* Sent automatically to parents

### Donations

* Campaigns with goals
* Dynamic progress bar
* Receipt & reporting system

### Dynamic Footer

* Manageable via Settings UI
* Contact, social links, quick links


## 🔒 Security & Compliance

* RBAC with `spatie/laravel-permission`
* Audit logging (optional)
* Privacy: signed URLs for media
* Safeguarding minors: parent dashboards, session monitoring
* PCI compliance via Stripe/PayPal


## 🧪 Testing

bash
php artisan test


* Unit: Pricing, PrayerTimes, Attendance
* Feature: Enrollment flow, Payments, Donations
* Dusk (optional): Trial → Subscription → Class join


## 🌍 Deployment

* PHP 8.3, Redis, MySQL/Postgres
* Nginx/Apache + HTTPS
* Supervisor for queues
* `php artisan config:cache && route:cache && view:cache`


## ❓ FAQ

**Q: Can Super Admin CRUD courses, teachers, books, and attend live classes?**
Yes. Super Admin has **full CRUD access** to all entities and can join/monitor live classes.

**Q: Is the footer dynamic?**
Yes. Contact info, menus, and social links are editable from settings.

**Q: What’s the trial → paid flow?**
Students book a free trial → attend → system prompts upgrade to subscription.


## 📜 License

MIT (or your chosen license)



