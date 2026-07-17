@php
    $shareUrl = urlencode(url()->current());
    $shareTitle = urlencode($title ?? '');
@endphp

<!-- Share Section -->
<div class="share-container" style="{{ $style ?? 'margin-top: 2rem; border-top: 1px solid var(--color-border); padding-top: 1.5rem;' }}">
    <h4 style="font-size: 0.9rem; color: var(--color-secondary); margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.4rem; margin-top: 0; font-weight: 600;">
        <i class="fa-solid fa-share-nodes"></i> Bagikan Halaman Ini:
    </h4>
    <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
        <!-- WhatsApp -->
        <a href="https://api.whatsapp.com/send?text={{ $shareTitle }}%20{{ $shareUrl }}" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; background-color: #25d366; color: white; transition: transform 0.2s ease, opacity 0.2s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" title="Bagikan ke WhatsApp">
            <i class="fa-brands fa-whatsapp" style="font-size: 0.95rem;"></i>
        </a>
        
        <!-- Facebook -->
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; background-color: #1877f2; color: white; transition: transform 0.2s ease, opacity 0.2s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" title="Bagikan ke Facebook">
            <i class="fa-brands fa-facebook-f" style="font-size: 0.9rem;"></i>
        </a>
        
        <!-- Twitter / X -->
        <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; background-color: #000000; color: white; transition: transform 0.2s ease, opacity 0.2s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" title="Bagikan ke Twitter / X">
            <i class="fa-brands fa-x-twitter" style="font-size: 0.85rem;"></i>
        </a>
        
        <!-- LinkedIn -->
        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; background-color: #0077b5; color: white; transition: transform 0.2s ease, opacity 0.2s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" title="Bagikan ke LinkedIn">
            <i class="fa-brands fa-linkedin-in" style="font-size: 0.9rem;"></i>
        </a>
        
        <!-- Copy Link -->
        <button onclick="copyShareLink(this)" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; background-color: #475569; color: white; border: none; cursor: pointer; transition: transform 0.2s ease, opacity 0.2s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" title="Salin Tautan">
            <i class="fa-solid fa-link" style="font-size: 0.85rem;"></i>
        </button>
        
        <!-- Toast Notification for Copy Success -->
        <span class="copy-toast" style="display: none; align-self: center; font-size: 0.8rem; color: #22c55e; font-weight: 600; margin-left: 0.35rem; transition: opacity 0.3s ease; opacity: 0;">
            <i class="fa-solid fa-check"></i> Tautan disalin!
        </span>
    </div>
</div>

<script>
    if (typeof copyShareLink !== 'function') {
        function copyShareLink(btn) {
            navigator.clipboard.writeText(window.location.href).then(() => {
                const toast = btn.parentElement.querySelector('.copy-toast');
                if (toast) {
                    toast.style.display = 'inline-block';
                    setTimeout(() => {
                        toast.style.opacity = '1';
                    }, 10);
                    
                    setTimeout(() => {
                        toast.style.opacity = '0';
                        setTimeout(() => {
                            toast.style.display = 'none';
                        }, 300);
                    }, 2000);
                }
            }).catch(err => {
                console.error('Gagal menyalin tautan: ', err);
            });
        }
    }
</script>
