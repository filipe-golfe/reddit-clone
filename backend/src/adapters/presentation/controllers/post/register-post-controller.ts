import { HttpRequest, HttpResponse } from '../ports/http';
import { serverError, ok } from '../helpers/http-helper';
import { RegisterPostResponse } from '../../../../domain/usecases/post/register-post/register-post-response';
import { IRegisterPost } from '../../../../domain/usecases/post/register-post/register-post-interface';

export class RegisterPostController {
  private readonly registerPost: IRegisterPost;

  constructor(registerPost: IRegisterPost) {
    this.registerPost = registerPost;
  }

  async handle(httpRequest: HttpRequest): Promise<HttpResponse> {
    try {
      const postData = {
        idUsuario: httpRequest.data.idUsuario,
        titulo: httpRequest.data.titulo,
        conteudo: httpRequest.data.conteudo,
        // tags
      };

      const registerPostResponse: RegisterPostResponse =
        await this.registerPost.execute(postData);

      return ok(registerPostResponse);
    } catch (error) {
      return serverError(error);
    }
  }
}
