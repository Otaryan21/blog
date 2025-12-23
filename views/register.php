<?php include 'header.php'; ?>

<div style="background: #f1f5f9; min-height: 100vh; display: flex; align-items: center; justify-content: center; font-family: sans-serif;">
    <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 100%; max-width: 400px;">
        
        <h2 style="text-align: center; color: #1e293b; margin-bottom: 25px;">🆕 Գրանցում</h2>

        <?php if (!empty($error)): ?>
            <div style="background: #fee2e2; color: #ef4444; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem;">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <form action="index.php?action=register" method="POST">
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #475569;">Օգտանուն</label>
                <input type="text" name="username" placeholder="Միայն լատինատառ (3+ նիշ)"
                       pattern="^[a-zA-Z0-9]{3,}$" 
                       title="Առնվազն 3 նիշ, միայն լատինատառ և թվեր"
                       style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 10px; box-sizing: border-box;" required>
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #475569;">Գաղտնաբառ</label>
                <input type="password" name="password" placeholder="6+ նիշ, Մեծատառ, Թիվ, Նշան"
                       pattern="(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}" 
                       title="Մինիմում 6 նիշ, առնվազն մեկ մեծատառ, մեկ թիվ և մեկ հատուկ նշան (@#$%...)"
                       style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 10px; box-sizing: border-box;" required>
            </div>

            <button type="submit" style="width: 100%; background: #2563eb; color: white; padding: 14px; border: none; border-radius: 10px; font-weight: bold; cursor: pointer; transition: 0.3s;">
                Գրանցվել
            </button>
        </form>

        <p style="text-align: center; margin-top: 20px; color: #64748b;">
            Արդեն ունե՞ք հաշիվ: <a href="index.php?action=login" style="color: #2563eb; text-decoration: none; font-weight: bold;">Մուտք</a>
        </p>
    </div>
</div>
</body>
</html>