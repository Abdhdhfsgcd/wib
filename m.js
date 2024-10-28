const sql = require('mssql');

// إعداد الاتصال بقاعدة البيانات
const config = {
    user: 'root', // ضع اسم مستخدم SQL Server هنا
    password: '', // ضع كلمة المرور هنا
    server: 'localhost', // إذا كنت تستخدم قاعدة بيانات محلية، استخدم "localhost"
    database: 'libya', // اسم قاعدة البيانات الخاصة بك
    options: {
        encrypt: true, // التشفير ضروري إذا كنت تتصل بخادم Azure
        trustServerCertificate: true // ضروري إذا كنت تتصل بالخادم محلياً
    }
};

// دالة الاتصال بقاعدة البيانات واسترجاع البيانات من جدول "تسيل"
async function getUserData() {
    try {
        // الاتصال بقاعدة البيانات
        let pool = await sql.connect(config);
        
        // استعلام للحصول على جميع المستخدمين وكلمات المرور من جدول "تسيل"
        let result = await pool.request().query('SELECT * FROM تسيل');
        
        console.log(result.recordset); // طباعة النتائج
        
    } catch (err) {
        console.error('حدث خطأ:', err);
    } finally {
        // إغلاق الاتصال
        sql.close();
    }
}

// استدعاء الدالة
getUserData();


// استدعاء الدالة
getUserData();
