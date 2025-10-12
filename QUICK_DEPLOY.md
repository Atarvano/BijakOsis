# 🚀 QUICK START - Deploy ke Railway

## Cara Tercepat (5 Menit):

### 1. Commit & Push ke GitHub

```bash
git add .
git commit -m "Ready for Railway deployment"
git push origin main
```

### 2. Deploy Sekarang!

**Pilih salah satu:**

#### A. Via Railway Dashboard (Paling Mudah):

1. Buka https://railway.app
2. Login dengan GitHub
3. Klik "New Project" → "Deploy from GitHub repo"
4. Pilih repository `BijakOsis`
5. Tunggu 2-3 menit... DONE! ✅

#### B. Via Railway CLI (Untuk Developer):

```bash
npm i -g @railway/cli
railway login
railway init
railway up
```

### 3. Set Environment di Railway Dashboard:

Buka project di Railway → Variables → Add these:

```
APP_ENV=production
APP_DEBUG=false
DB_CONNECTION=sqlite
```

**PENTING:** Railway akan auto-generate `APP_KEY` dan `APP_URL`!

### 4. Buka Aplikasi:

Klik URL yang diberikan Railway (misal: `https://bijakosis-production.up.railway.app`)

## ✅ Apa yang Sudah Otomatis:

-   ✅ Database SQLite dibuat otomatis
-   ✅ Migration jalan otomatis
-   ✅ Cache di-build otomatis
-   ✅ NPM packages di-install otomatis
-   ✅ Vite build assets otomatis

## 🔄 Update Aplikasi:

Setiap kali push ke GitHub, Railway auto-redeploy:

```bash
git add .
git commit -m "Update fitur baru"
git push origin main
```

**Tunggu 2-3 menit → Aplikasi updated! 🎉**

## 💡 Tips:

-   Logs bisa dilihat di Railway Dashboard
-   Database SQLite persistent (tidak hilang saat redeploy)
-   Free tier Railway: 500 hours/month (cukup untuk development)

## ❗ Troubleshooting:

Jika ada error, cek Railway logs:

1. Buka project di Railway
2. Klik tab "Deployments"
3. Klik deployment terakhir
4. Lihat logs

---

**That's it! Super simple kan? 😎**
