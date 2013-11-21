from django import template

register = template.Library()

@register.filter
def class_as_text(class_id):
	classes = {
		1: 'Lutador',
		2: 'Mecanico',
		3: 'Arqueira',
		4: 'Pikeman',
		5: 'Atalanta',
		6: 'Cavaleiro',
		7: 'Mago',
		8: 'Sacerdotisa',
	}

	return classes[class_id]
