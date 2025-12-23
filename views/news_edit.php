<?php include 'header.php'; ?>

<div class="container" style="max-width: 700px; margin: 40px auto; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.1); font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    
    <div style="text-align: center; margin-bottom: 30px;">
        <h2 style="color: #1e293b; font-size: 2rem; margin-bottom: 10px;">📝 Խմբագրել Լուրը</h2>
        <p style="color: #64748b;">Փոփոխեք լուրի տվյալները և նկարը</p>
    </div>
    
    <form action="index.php?action=edit&id=<?= $item['id'] ?>" method="POST" enctype="multipart/form-data">
        
        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 10px; color: #334155; font-weight: 600;">Վերնագիր</label>
            <input type="text" name="title" value="<?= htmlspecialchars($item['title']) ?>" 
                   style="width: 100%; padding: 14px; border: 2px solid #e2e8f0; border-radius: 12px; font-size: 1rem; box-sizing: border-box;" required>
        </div>

        <div style="margin-bottom: 25px;">
    <label style="display: block; margin-bottom: 10px; color: #334155; font-weight: 600;">🖼️ Լուրի նկարը</label>
    <div style="display: flex; align-items: center; gap: 20px; background: #f8fafc; padding: 15px; border-radius: 15px; border: 2px dashed #e2e8f0;">
        <?php if (!empty($item['image'])): ?>
            <img src="uploads/<?= $item['image'] ?>" style="width: 80px; height: 50px; object-fit: cover; border-radius: 8px;">
        <?php endif; ?>

        <label style="background: #3b82f6; color: white; padding: 10px 20px; border-radius: 10px; cursor: pointer; font-size: 0.9rem; font-weight: 600;">
            ☁️ Փոխել նկարը
            <input type="file" name="image" style="display: none;" onchange="document.getElementById('file-name').innerHTML = this.files[0].name">
        </label>
        <span id="file-name" style="font-size: 0.85rem; color: #64748b;">Ֆայլ ընտրված չէ</span>
    </div>
</div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; margin-bottom: 10px; color: #334155; font-weight: 600;">Բաժին</label>
            <select name="category" style="width: 100%; padding: 14px; border: 2px solid #e2e8f0; border-radius: 12px; font-size: 1rem; background-color: #f8fafc; cursor: pointer; box-sizing: border-box;">
                <option value="Հայաստան" <?= ($item['category'] == 'Հայաստան') ? 'selected' : '' ?>>🇦🇲 Հայաստան</option>
                <option value="Աշխարհ" <?= ($item['category'] == 'Աշխարհ') ? 'selected' : '' ?>>🌍 Աշխարհ</option>
                <option value="Սպորտ" <?= ($item['category'] == 'Սպորտ') ? 'selected' : '' ?>>⚽ Սպորտ</option>
                <option value="Տեխնոլոգիա" <?= ($item['category'] == 'Տեխնոլոգիա') ? 'selected' : '' ?>>💻 Տեխնոլոգիա</option>
                <option value="Ժամանց" <?= ($item['category'] == 'Ժամանց') ? 'selected' : '' ?>>🎭 Ժամանց</option>
                <option value="Տնտեսություն" <?= ($item['category'] == 'Տնտեսություն') ? 'selected' : '' ?>>📈 Տնտեսություն</option>
                <option value="Էքսկլյուզիվ" <?= ($item['category'] == 'Էքսկլյուզիվ') ? 'selected' : '' ?>>✨ Էքսկլյուզիվ</option>
            </select>
        </div>

        <div style="margin-bottom: 30px;">
            <label style="display: block; margin-bottom: 10px; color: #334155; font-weight: 600;">Լուրի Տեքստը</label>
            <textarea name="content" rows="10" 
                      style="width: 100%; padding: 14px; border: 2px solid #e2e8f0; border-radius: 12px; font-size: 1rem; resize: vertical; box-sizing: border-box;" required><?= htmlspecialchars($item['content']) ?></textarea>
        </div>

        <div style="display: flex; gap: 15px;">
            <a href="index.php?action=view&id=<?= $item['id'] ?>" 
               style="flex: 1; text-align: center; background: #f1f5f9; color: #475569; padding: 15px; border-radius: 12px; text-decoration: none; font-weight: 600;">Չեղարկել</a>
            <button type="submit" 
                    style="flex: 2; background: #2563eb; color: white; padding: 15px; border: none; border-radius: 12px; font-size: 1rem; font-weight: 700; cursor: pointer; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);">
                Պահպանել Փոփոխությունները
            </button>
        </div>
    </form>
</div>

</body>
</html>