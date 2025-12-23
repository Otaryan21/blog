<?php include 'header.php'; ?>

<div class="container" style="max-width: 900px; margin: 30px auto; background: white; padding: 35px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); font-family: sans-serif;">
    
    <article>
        <h1 style="color: #1e293b; font-size: 2.2rem; margin-bottom: 20px;"><?= htmlspecialchars($item['title'] ?? '') ?></h1>

        <?php if (isset($_SESSION['username']) && $_SESSION['username'] === ($item['author'] ?? '')): ?>
            <div style="margin-bottom: 25px; display: flex; gap: 10px;">
                <a href="index.php?action=edit&id=<?= $item['id'] ?>" style="background: #f59e0b; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold;">✎ Խմբագրել</a>
                <a href="index.php?action=delete&id=<?= $item['id'] ?>" onclick="return confirm('Ջնջե՞լ այս լուրը:')" style="background: #ef4444; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold;">🗑 Ջնջել</a>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($item['image'])): ?>
            <img src="uploads/<?= htmlspecialchars($item['image']) ?>" style="width: 100%; border-radius: 12px; margin-bottom: 30px; object-fit: cover; max-height: 500px;">
        <?php endif; ?>

        <div style="font-size: 1.15rem; line-height: 1.8; color: #334155; white-space: pre-wrap; margin-bottom: 50px;">
            <?= htmlspecialchars($item['content'] ?? '') ?>
        </div>
    </article>

    <hr style="border: 0; border-top: 1px solid #e2e8f0; margin-bottom: 40px;">

    <section>
        <h3 style="color: #0f172a; margin-bottom: 20px;">💬 Մեկնաբանություններ</h3>
        
        <?php if (isset($_SESSION['username'])): ?>
            <form action="index.php?action=add_comment&id=<?= $item['id'] ?>" method="POST" style="margin-bottom: 40px;">
                <textarea name="comment_text" placeholder="Գրեք ձեր մեկնաբանությունը..." style="width: 100%; height: 100px; padding: 15px; border-radius: 12px; border: 2px solid #e2e8f0; font-size: 1rem; box-sizing: border-box; outline: none; transition: border 0.3s;" required></textarea>
                <button type="submit" style="background: #2563eb; color: white; border: none; padding: 12px 25px; border-radius: 10px; margin-top: 10px; cursor: pointer; font-weight: 600; font-size: 1rem; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);">Ուղարկել</button>
            </form>
        <?php else: ?>
            <p style="background: #f1f5f9; padding: 15px; border-radius: 10px; color: #475569;">Մեկնաբանություն թողնելու համար խնդրում ենք <a href="index.php?action=login" style="color: #2563eb; font-weight: 600;">մուտք գործել</a>։</p>
        <?php endif; ?>

        <div class="comments-list">
            <?php if (empty($comments)): ?>
                <p style="color: #64748b; font-style: italic;">Դեռ մեկնաբանություններ չկան:</p>
            <?php else: ?>
                <?php foreach ($comments as $comment): ?>
                    <div style="background: #f8fafc; padding: 20px; border-radius: 15px; margin-bottom: 15px; border: 1px solid #e2e8f0;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                            <div style="flex: 1;">
                                <strong style="color: #2563eb; font-size: 1rem; display: block; margin-bottom: 5px;">
                                    <?= htmlspecialchars($comment['author']) ?>
                                </strong>
                                <p style="margin: 0; color: #334155; line-height: 1.5; font-size: 1rem;">
                                    <?= htmlspecialchars($comment['comment_text']) ?>
                                </p>
                                <small style="color: #94a3b8; font-size: 0.8rem; display: block; margin-top: 10px;">
                                    🕒 <?= date("d.m.Y H:i", strtotime($comment['created_at'])) ?>
                                </small>
                            </div>

                            <?php if (isset($_SESSION['username']) && $_SESSION['username'] === $comment['author']): ?>
                                <a href="index.php?action=delete_comment&comment_id=<?= $comment['id'] ?>&news_id=<?= $item['id'] ?>" 
                                   onclick="return confirm('Ջնջե՞լ այս մեկնաբանությունը:')"
                                   style="color: #ef4444; text-decoration: none; font-size: 0.85rem; background: #fee2e2; padding: 6px 12px; border-radius: 8px; font-weight: 600; transition: 0.3s; margin-left: 15px;">
                                   🗑️ Ջնջել
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
</div>

</body>
</html>