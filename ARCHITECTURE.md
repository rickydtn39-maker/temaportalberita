# Gesahan News Framework

## Architecture Specification

Version 2.0

---

# Filosofi

Framework dibangun berdasarkan prinsip:

Content First.

Seluruh keputusan desain dibuat untuk meningkatkan pengalaman membaca berita.

---

# Layer

```
Framework

↓

Layout

↓

Components

↓

Sections

↓

Pages
```

---

# Struktur Folder

```
assets/
inc/
template-parts/
```

Struktur ini bersifat final.

---

# CSS

```
base/
layout/
components/
pages/
utilities/
```

Tidak boleh membuat file CSS di luar struktur tersebut.

---

# PHP

Semua query berada di:

```
inc/core/
```

Template tidak membuat query sendiri.

Template hanya menampilkan data.

---

# Components

Semua UI harus reusable.

Contoh:

- News Card
- Hero Card
- Button
- Badge
- Navigation

Tidak boleh membuat komponen yang hanya dipakai satu halaman jika masih bisa digunakan ulang.

---

# Homepage

Homepage terdiri dari section.

```
Hero

↓

Trending

↓

Latest

↓

Category

↓

Video

↓

Newsletter
```

Setiap section berada pada:

```
template-parts/sections/
```

---

# Naming

CSS

```
gn-
```

PHP

```
gesahan_
```

---

# Responsive

Mobile First.

Breakpoints

- Mobile
- Tablet
- Desktop

---

# Performance

Target

Performance

90+

SEO

95+

Accessibility

95+

Best Practices

95+

---

# Rules

- Tidak menggunakan Bootstrap.
- Tidak menggunakan Tailwind.
- Tidak menggunakan jQuery.
- Menggunakan CSS Modern.
- Menggunakan Vanilla JavaScript.
- Mengikuti WordPress Coding Standards.

---

# Definition of Done

Sebuah sprint dianggap selesai jika:

- Desktop selesai.
- Tablet selesai.
- Mobile selesai.
- Tidak ada error PHP.
- Tidak ada error JavaScript.
- Responsive.
- Commit.
- Push.

---

# Project Status

Architecture Frozen.

Mulai tahap ini struktur proyek tidak berubah lagi.

Seluruh pekerjaan berikutnya hanya berupa implementasi fitur.