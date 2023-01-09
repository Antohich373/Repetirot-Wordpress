import Controls from "./Controls.js"

export default class Select extends Controls {
    constructor(select) {
        super(select)
        
        this.select = select
        this.input = this.select.querySelector('input')
        this.is_open = true

        // Кнопка селекта
        this.toggler_handler = this.toggle.bind(this)

        this.button = this.select.querySelector('.select__button')
        this.button.addEventListener('click', this.toggler_handler)

        // Список
        this.list = this.select.querySelector('.select__list')
     
        // Значения
        this.set_value_handled = this.setTargetValue.bind(this)

        this.values = this.list.querySelectorAll('[data-value]')
        this.values.forEach(value => value.addEventListener('click', this.set_value_handled))

        // Значение по умолчанию
        this.setDefaultValue()
        this.toggle()
    }

    toggle() {
        if (this.is_open) {
            this.close()
        } else {
            this.open()
        }
    }

    open() {
        this.list.hidden = false
        this.is_open = true
    }

    close() {
        this.list.hidden = true
        this.is_open = false
    }

    setTargetValue(e) {
        e.preventDefault()

        const item = e.target

        if (item.dataset.value) {
            const text = item.innerText
            const value = item.dataset.value

            this.setValue(text, value)
            this.close()
        }
    }

    async setDefaultValue() {
        let selected_value = ''
        let selected_text = ''

        for (let i = 0; i < this.values.length; i++) {
            const value = this.values[i]

            if (value.getAttribute('selected')) {
                selected_text = await value.getAttribute('selected') ? value.innerText : null
                selected_value = await value.getAttribute('selected') ? value.dataset.value : null

                break
            }
        }

        if (selected_value) {
            this.setValue(selected_text, selected_value)
        } else {
            let placeholder = 'Выберите'

            if (this.button.dataset.placeholder) {
                placeholder = this.button.dataset.placeholder
            }

            this.setValue(placeholder, 0)
        }
    }

    setValue(text, value) {
        this.button.innerText = text
        this.input.value = value
    }

    static init() {
        const selects = document.querySelectorAll('.select')

        if (selects.length) {
            selects.forEach(select => new Select(select))
        }
    }
}

Select.init()