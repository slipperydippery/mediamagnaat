module.exports = {
    theme: {
        minWidth: {
            '0': '0',
            '1/4': '25%',
            '1/2': '50%',
            '3/4': '75%',
            'full': '100%',
        },
        extend: {
            colors: {
                'primary': '#1C154B',
                'secondary': '#07737C',
                'secondary-light': '#2E8D95',
                'secondary-dark': '#01626A',
                gray: {
                    '100': '#f5f5f5',
                    '200': '#eeeeee',
                    '300': '#e0e0e0',
                    '400': '#bdbdbd',
                    '500': '#9e9e9e',
                    '600': '#757575',
                    '700': '#616161',
                    '800': '#424242',
                    '850': '#272727',
                    '900': '#212121',
                }
            },
            spacing: {
                '1/2': '50%',
                '1/3': '33.333333%',
                '2/3': '66.666667%',
                '1/4': '25%',
                '2/4': '50%',
                '3/4': '75%',
                '1/5': '20%',
                '2/5': '40%',
                '3/5': '60%',
                '4/5': '80%',
                '1/6': '16.666667%',
                '2/6': '33.333333%',
                '3/6': '50%',
                '4/6': '66.666667%',
                '5/6': '83.333333%',
                '1/12': '8.333333%',
                '2/12': '16.666667%',
                '3/12': '25%',
                '4/12': '33.333333%',
                '5/12': '41.666667%',
                '6/12': '50%',
                '7/12': '58.333333%',
                '8/12': '66.666667%',
                '9/12': '75%',
                '10/12': '83.333333%',
                '11/12': '91.666667%',
                'xl16': '912px',
                'xl9': '513px',
                'lg16': '768px',
                'lg9':  '432px',
                'md16': '640px',
                'md9': '360px',
                'sm16': '512px',
                'sm9': '300px',
                'xs16': '224px',
                'xs9': '126px',
            }
        }
    },
    variants: {},

    plugins: [
        require('@tailwindcss/custom-forms'),
    ]
}
