module.exports = {
    purge: [],
    theme: {
        extend: {
            colors: {
                black: '#0b0c10',
                white: '#fff',
                blue: '#121828',
                gray: {
                    hard: '#666b7f',
                    medium: '#a3a6b2',
                    normarl: ''
                },
                light: {
                    hard: '#edf0f7',
                    medium: '#f8f9fc',
                    normarl: '#fbfcfd'
                }
            },

            textColor: {
                black: '#0b0c10',
                white: '#fff',
                customblue: '#121828',
                gray: {
                    hard: '#666b7f',
                    medium: '#a3a6b2',
                    normal: ''
                },
                light: {
                    hard: '#edf0f7',
                    medium: '#f8f9fc',
                    normal: '#fbfcfd'
                }
            },
            backgroundColor: {
                black: '#0b0c10',
                white: '#fff',
                blue: '#121828',
                gray: {
                    hard: '#666b7f',
                    medium: '#a3a6b2',
                    normal: ''
                },
                light: {
                    hard: '#edf0f7',
                    medium: '#f8f9fc',
                    normal: '#fbfcfd'
                }
            }
        }
    },
    variants: {
        outline: ['responsive', 'focus', 'hover', 'active']
    },
    plugins: [require('@tailwindcss/custom-forms')]
};
