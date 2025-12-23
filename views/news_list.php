<?php include 'header.php'; ?>

<div class="container" style="max-width: 1000px; margin: 20px auto; padding: 0 15px;">
    <h2 style="color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; margin-bottom: 25px;">
        <?php echo isset($_GET['name']) ? "Բաժին՝ " . htmlspecialchars($_GET['name']) : "Վերջին լուրեր"; ?>
    </h2>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;">
        <?php if (empty($news)): ?>
            <p>Այս բաժնում դեռ լուրեր չկան:</p>
        <?php else: ?>
            <?php foreach ($news as $item): ?>
                <div style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1); display: flex; flex-direction: column;">
                    
                    <?php if (!empty($item['image'])): ?>
                        <img src="uploads/<?= htmlspecialchars($item['image']) ?>" style="width: 100%; height: 200px; object-fit: cover;">
                    <?php else: ?>
                        <div style="width: 100%; height: 200px; background: #ecf0f1; display: flex; align-items: center; justify-content: center; color: #bdc3c7;">Նկար չկա</div>
                    <?php endif; ?>

                    <div style="padding: 15px; flex-grow: 1; display: flex; flex-direction: column;">
                        <span style="font-size: 11px; color: #3498db; font-weight: bold; text-transform: uppercase;">
                            <?= htmlspecialchars($item['category'] ?? 'Լուրեր') ?>
                        </span>
                        
                        <h3 style="margin: 10px 0; color: #2c3e50; font-size: 1.2rem; line-height: 1.4;">
                            <?= htmlspecialchars($item['title']) ?>
                        </h3>

                        <p style="font-size: 0.9rem; color: #7f8c8d; margin-bottom: 15px;">
                            ✍️ Հեղինակ՝ <strong><?= htmlspecialchars($item['author'] ?? 'Անհայտ') ?></strong>
                        </p>

                        <div style="margin-top: auto; display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 12px; color: #95a5a6;"><?= date('d.m.Y', strtotime($item['created_at'])) ?></span>
                            <a href="index.php?action=view&id=<?= $item['id'] ?>" style="background: #3498db; color: white; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 13px; font-weight: bold;">Կարդալ ավելին</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<style>
    body { background-color: #f4f7f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    .container { animation: fadeIn 0.5s ease-in; }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
</style>