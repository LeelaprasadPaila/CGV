import uuid

def generate_unique_registration_id():
    registration_id = uuid.uuid4().int & (1 << 32) - 1

    return registration_id

registration_id = generate_unique_registration_id()