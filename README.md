# 💸 Peer-to-Peer Lending System

A mini banking web application that allows users to lend and borrow money directly from each other — without a traditional bank. This system tracks users, loans, payments, overdue alerts, and reliability scores using a clean dashboard interface and MySQL backend.

## 🚀 Project Overview

This web-based system allows:

- 👤 **User registration** as either a lender or a borrower
- 💰 **Loan creation** between users
- 🧾 **Payment tracking** against existing loans
- 🔔 **Overdue alerts** for missed payments
- 📊 **Reliability score** calculation based on payment behavior
- 📂 **Loan history** viewing and management

---

## 🧠 How It Works

- **Lenders** offer money via the "Create Loan" feature.
- **Borrowers** receive loans and can make repayments.
- **Admins** can track who paid, who missed payments, and how trustworthy each user is.

Each feature is available through a structured and simple UI using HTML, CSS, and JavaScript.

---

## 🛠️ Tech Stack

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL (via phpMyAdmin / XAMPP)
- **Local Server**: XAMPP

---

## 📁 Folder Structure

Peer2PeerLending/
├── index.php
├── /assets/
│ └── style.css
├── /pages/
│ ├── dashboard.php
│ ├── new_user.php
│ ├── new_loan.php
│ ├── make_payment.php
│ ├── loan_history.php
│ ├── overdue_alerts.php
│ └── reliability_scores.php
├── /backend/
│ ├── db.php
│ ├── insert_user.php
│ ├── insert_loan.php
│ ├── insert_payment.php
│ ├── check_overdue.php
│ └── calculate_score.php
└── README.md


---

## 🧾 Database Tables

| Table Name        | Description                                |
|-------------------|--------------------------------------------|
| `user`            | Stores user info: name, email, role        |
| `loan`            | Stores loan details: lender, borrower, etc.|
| `payment`         | Tracks repayments                          |
| `loanHistory`     | Archives past loans                        |
| `interestRate`    | Configurable loan interest rates           |
| `transaction`     | Tracks flow of money                       |
| `overdueAlert`    | Flags missed payments                      |
| `reliabilityScore`| Scores users based on payment behavior     |

---

## 📌 Key Pages

| Page                | Description                                     |
|---------------------|-------------------------------------------------|
| `dashboard.php`      | Main hub with links to all actions              |
| `new_user.php`       | Add new users to the system                     |
| `new_loan.php`       | Create a loan between two users                 |
| `make_payment.php`   | Record a payment against a loan                 |
| `loan_history.php`   | View all loans ever created                     |
| `overdue_alerts.php` | View loans with missed payments                 |
| `reliability_scores.php` | View scores that reflect user trustworthiness |

---

## ⚙️ Setup Instructions

1. 📦 **Install XAMPP** and start Apache + MySQL
2. 🛠️ **Create a new database** called `loanmanagement` in phpMyAdmin
3. 🗃️ **Import the SQL schema** (or create tables manually as per the structure above)
4. 🧩 **Place project folder** (`Peer2PeerLending/`) in `htdocs/`
5. 🌐 Open your browser and visit:  http://localhost/Peer2PeerLending/


---

## ✅ Features Summary

- [x] Add new users
- [x] Lend or borrow money
- [x] Track payments
- [x] Flag overdue repayments
- [x] Score user reliability
- [x] Clean, responsive dashboard interface

---

## 📌 Future Improvements

- Add user authentication and role-based access
- Enhance dashboard analytics
- Improve UI with modern frameworks (e.g., React, Bootstrap)
- Deploy to cloud (using Supabase, Firebase, or VPS)

---

## 📚 Credits

Developed by: *[Your Name]*  
B.Tech CSE – Data Structures Project  
Database Design and Frontend by *You*

---

## 🏁 License

This project is for educational use only. You are free to modify and adapt it for personal learning or demonstration purposes.


