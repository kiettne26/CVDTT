let utils = {
    truncateText: (text, maxLength = 20) => {
        if (!text) {
            return ''
        }

        if (text.length > maxLength) {
            return text.slice(0, maxLength - 3) + '...'
        }

        return text
    },
    truncateTextJP: (text, maxLength = 20, fixedLength = false) => {
        if (!text) {
            return '';
        }

        if (fixedLength && text.length > maxLength) {
            return text.slice(0, maxLength - 3) + '...';
        }

        maxLength = maxLength * 2

        let fullWidthCount = 0;
        let halfWidthCount = 0;
        let regex = /[\uFF01-\uFF5E\uFF10-\uFF19\uFF21-\uFF3A\uFF41-\uFF5A\u3000-\u30FF]/u;

        for (let i = 0; i < text.trim().length; i++) {
            const char = text.charAt(i);
            if (regex.test(char)) {
                fullWidthCount += 2; // Full-width character counted as 2
            } else {
                halfWidthCount++; // Half-width character counted as 1
            }

            const totalLength = fullWidthCount + halfWidthCount;

            // Check if the total length exceeds the maxLength
            if (totalLength > maxLength) {
                return text.slice(0, i - 3) + '...';
            }
        }

        return text;
    }

}
