<?php include 'header.php'; ?>

<div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; padding: 60px 20px; display: flex; justify-content: center; align-items: center; font-family: 'Poppins', sans-serif;">
    
    <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); width: 100%; max-width: 650px; padding: 50px; border-radius: 40px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border: 1px solid rgba(255, 255, 255, 0.3);">
        
        <div style="text-align: center; margin-bottom: 45px;">
            <div style="background: linear-gradient(45deg, #2563eb, #7c3aed); width: 80px; height: 80px; border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; transform: rotate(-10deg); box-shadow: 0 10px 20px rgba(124, 58, 237, 0.3);">
                <span style="font-size: 2.5rem; color: white; transform: rotate(10deg);">✍️</span>
            </div>
            <h2 style="color: #1e293b; font-size: 2.2rem; font-weight: 800; letter-spacing: -1px; margin: 0;">Ստեղծել Լուր</h2>
            <p style="color: #64748b; margin-top: 10px; font-weight: 500;">Լրացրեք մանրամասները հրապարակման համար</p>
        </div>

        <form action="index.php?action=add" method="POST" enctype="multipart/form-data">
            
            <div style="margin-bottom: 30px; position: relative;">
                <label style="color: #475569; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; margin-left: 5px; margin-bottom: 10px; display: block;">Վերնագիր</label>
                <input type="text" name="title" placeholder="Ի՞նչ է տեղի ունեցել" 
                       style="width: 100%; padding: 16px 20px; border: 2px solid #f1f5f9; border-radius: 18px; font-size: 1rem; background: #f8fafc; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); outline: none;"
                       onfocus="this.style.borderColor='#3b82f6'; this.style.background='#fff'; this.style.boxShadow='0 10px 15px -3px rgba(59, 130, 246, 0.1)';" 
                       onblur="this.style.borderColor='#f1f5f9'; this.style.background='#f8fafc';" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
                <div>
                    <label style="color: #475569; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px; display: block;">Բաժին</label>
                    <select name="category" style="width: 100%; padding: 16px; border: 2px solid #f1f5f9; border-radius: 18px; font-size: 1rem; background: #f8fafc; cursor: pointer; outline: none; transition: 0.3s;">
                        <option value="Հայաստան">🇦🇲 Հայաստան</option>
                        <option value="Աշխարհ">🌍 Աշխարհ</option>
                        <option value="Սպորտ">⚽ Սպորտ</option>
                        <option value="Տեխնոլոգիա">💻 Տեխնոլոգիա</option>
                        <option value="Ժամանց">🎭 Ժամանց</option>
                        <option value="Տնտեսություն">📈 Տնտեսություն</option>
                        <option value="Էքսկլյուզիվ">✨ Էքսկլյուզիվ</option>
                    </select>
                </div>
                <div>
                    <label style="color: #475569; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px; display: block;">Պատկեր</label>
                    <div style="position: relative; overflow: hidden; background: #f8fafc; border: 2px dashed #e2e8f0; border-radius: 18px; padding: 12px; text-align: center;">
                        <input type="file" name="image" style="font-size: 0.8rem; color: #64748b; cursor: pointer;">
                    </div>
                </div>
            </div>

            <div style="margin-bottom: 40px;">
                <label style="color: #475569; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px; display: block;">Լուրի տեքստը</label>
                <textarea name="content" rows="8" placeholder="Գրեք բովանդակությունը այստեղ..." 
                          style="width: 100%; padding: 20px; border: 2px solid #f1f5f9; border-radius: 20px; font-size: 1rem; resize: none; background: #f8fafc; transition: 0.3s; outline: none; line-height: 1.6;"
                          onfocus="this.style.borderColor='#3b82f6'; this.style.background='#fff';" 
                          onblur="this.style.borderColor='#f1f5f9'; this.style.background='#f8fafc';" required></textarea>
            </div>

            <button type="submit" style="width: 100%; background: linear-gradient(90deg, #2563eb, #7c3aed); color: white; padding: 20px; border: none; border-radius: 20px; font-size: 1.2rem; font-weight: 700; cursor: pointer; transition: transform 0.2s, box-shadow 0.2s; box-shadow: 0 15px 30px rgba(124, 58, 237, 0.3);"
                    onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 20px 40px rgba(124, 58, 237, 0.4)';"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 15px 30px rgba(124, 58, 237, 0.3)';"
                    onmousedown="this.style.transform='translateY(0)';">
                Հրապարակել հիմա
            </button>
        </form>
    </div>
</div>

</body>
</html>