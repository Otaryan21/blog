<?php include 'header.php'; ?>

<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-header">
            <i class="fas fa-user-circle"></i>
            <h2>Մուտք համակարգ</h2>
            <p>Բարի գալուստ LURER.AM</p>
        </div>
        
        <form action="index.php?action=login" method="POST">
            <div class="form-group">
                <label><i class="fas fa-user"></i> Օգտանուն</label>
                <input type="text" name="username" placeholder="Մուտքագրեք ձեր օգտանունը" required>
            </div>

            <div class="form-group">
                <label><i class="fas fa-lock"></i> Գաղտնաբառ</label>
                <input type="password" name="password" placeholder="********" required>
            </div>

            <button type="submit" class="auth-btn">Մուտք գործել</button>
        </form>

        <div class="auth-footer">
            Չունե՞ք հաշիվ: <a href="index.php?action=register">Գրանցվել հիմա</a>
        </div>
    </div>
</div>

<style>
    .auth-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: calc(100vh - 150px);
        padding: 20px;
    }

    .auth-card {
        background: #fff;
        width: 100%;
        max-width: 400px;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        text-align: center;
    }

    .auth-header i {
        font-size: 50px;
        color: #3498db;
        margin-bottom: 15px;
    }

    .auth-header h2 {
        margin: 0;
        color: #2c3e50;
        font-size: 24px;
    }

    .auth-header p {
        color: #7f8c8d;
        margin-top: 5px;
        font-size: 14px;
    }

    .form-group {
        text-align: left;
        margin-top: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #34495e;
        font-weight: 600;
        font-size: 14px;
    }

    .form-group input {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #edf2f7;
        border-radius: 10px;
        font-size: 16px;
        transition: 0.3s;
        box-sizing: border-box;
    }

    .form-group input:focus {
        border-color: #3498db;
        outline: none;
        background: #f8fbff;
    }

    .auth-btn {
        width: 100%;
        padding: 14px;
        background: #3498db;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 30px;
        transition: 0.3s;
    }

    .auth-btn:hover {
        background: #2980b9;
        transform: translateY(-2px);
    }

    .auth-footer {
        margin-top: 25px;
        font-size: 14px;
        color: #7f8c8d;
    }

    .auth-footer a {
        color: #3498db;
        text-decoration: none;
        font-weight: bold;
    }
</style>