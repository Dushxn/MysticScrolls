# 🌌 MysticScrolls 📚

**MysticScrolls** is an immersive reading and writing platform where users can manage their personal book library, write their own books with live previews, track their reading progress, and interact with beautifully designed dark-themed views.

---

## 🚀 Features

✨ **User Authentication** – Register / Login system using Laravel and MySQL  
📚 **My Library** – Add, edit, delete, and search your favorite books with cover images  
📝 **My Books** – Write and publish your own books with live preview and cover upload  
👀 **Read View** – Click on any book to read it in a dedicated, styled view  
🗒️ **Notes** – Add notes to books you're reading  
📈 **Track Reading Status** – `Read`, `Currently Reading`, `Not Read`  
📦 **MongoDB Integration** – MongoDB Atlas for dynamic content like books and notes  
💾 **File Uploads** – Image and PDF handling  
🎨 **Dark UI** – Futuristic, neon-accented styling with responsive design

---

## 🔧 Tech Stack

- **Backend**: Laravel 12 (PHP 8.2)
- **Frontend**: Blade + Tailwind-inspired custom CSS
- **Databases**:
  - ✅ MySQL – for users & auth
  - ✅ MongoDB Atlas – for books, notes, and written content
- **Packages**:
  - `mongodb/laravel-mongodb` for MongoDB integration
  - `barryvdh/laravel-dompdf` for PDF generation
  - `laravel/ui` (if using auth scaffolding)

---

## ⚙️ Setup Instructions

### 1️⃣ Clone the Project
```bash
git clone https://github.com/your-username/mysticscrolls.git
cd mysticscrolls
```

### 2️⃣ Install Dependencies
```bash
composer install
npm install && npm run dev
```

### 3️⃣ Setup `.env` File
```bash
cp .env.example .env
php artisan key:generate
```

### 4️⃣ Configure Your `.env`
```env
# App
APP_NAME=MysticScrolls
APP_URL=http://localhost

# MySQL for Authentication
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mysticscrolls_auth
DB_USERNAME=root
DB_PASSWORD=

# MongoDB for Books & Notes
DB_MONGODB_CONNECTION=mongodb
DB_MONGODB_HOST=cluster0.mongodb.net
DB_MONGODB_PORT=27017
DB_MONGODB_DATABASE=mysticscrolls
DB_MONGODB_USERNAME=your_mongo_user
DB_MONGODB_PASSWORD=your_mongo_password

# File Storage
FILESYSTEM_DISK=public
```

### 5️⃣ Run Migrations
```bash
php artisan migrate
```

### 6️⃣ Link Storage for Images
```bash
php artisan storage:link
```

---

## 🧪 Running the App

```bash
php artisan serve
```

Now visit [http://localhost:8000](http://localhost:8000) and explore the scrolls!

---

## 🖼️ Screenshots

> Add screenshots of:
> - My Library page
![image](https://github.com/user-attachments/assets/2ebec81d-cfbe-48b6-8dd8-2c1220a42f3e)

> - Write a Book page
![image](https://github.com/user-attachments/assets/dbcb9eba-5452-4b02-a71f-34fb31e9fd0b)

> - Book Detail view
![image](https://github.com/user-attachments/assets/89cceac4-cdd1-4b4c-97e9-a4a8534e82fa)


---

## 📂 Folder Structure

```
📁 app/
  └── Models/
      ├── Book.php        // MongoDB model
      ├── Note.php
📁 resources/
  └── views/
      ├── library/
      ├── userbooks/
      └── dashboard.blade.php
📁 routes/
  └── web.php             // Route definitions
📁 public/
  └── storage/books       // Uploaded cover images
```

---

## ✍️ Author

**Dushan Mahindarathna**  
_“A story isn’t just words — it’s a world.”_

---

## 📜 License

This project is open-source and available under the [MIT License](LICENSE).
